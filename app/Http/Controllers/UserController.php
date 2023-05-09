<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $mailService;

    public function __construct(UserService $userService, MailService $mailService)
    {
        $this->userService = $userService;
        $this->mailService = $mailService;
    }

    public function viewLoginPage()
    {
        try{
            $this->userService->firstRunApp();
        }catch (\Exception $e)
        {
//            throw new \Exception('Błąd bazy danych');
        }

        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $data = $request->only([
            'login',
            'password'
        ]);
        $result= ['status'=>200];
        try{
            $result['data'] = $this->userService->login($data);
        }catch (\Exception $e)
        {
            $result = [
                'status'=>500,
                'message'=>$e->getMessage(),
            ];
        }
        if($result['data']){
            return redirect()->route('home');
        }
        return back();

    }

    public function restartPasswordView(){
        return view('forget-password');
    }
    public function restartPassword(Request $request)
    {
        $data = $request->only(['email']);
        $result = ['status'=>200];
        try
        {
            $result['data'] = $this->mailService->sendResetPasswordEmail($data);
        }catch (\Exception $e)
        {
            $result =[
                'status'=>500,
                'message'=>$e->getMessage(),
                ];
        }
        return redirect()->route('login');
    }
    public function usersView()
    {
        try{
            $users = $this->userService->getUsers();
        }catch (\Exception $e)
        {

        }
        return view('users',['users'=>$users]);
    }

    public function userView($id)
    {
        try{
            $user = $this->userService->getUserById($id);
        }catch (\Exception $e)
        {

        }
        return view('showUsers',['user'=>$user]);
    }

    public function giveAdmin($id)
    {
        try{
            $this->userService->giveAdmin($id);
        }catch (\Exception $e)
        {

        }
        return redirect()->route('users');
    }

    public function findUserByNameAndSurname(Request $request)
    {
        $text = $request->text;
        try{
            $users = $this->userService->getUserByNameAndSurname($text);
        }catch (\Exception $e)
        {

        }
        return view('users',['users'=>$users]);
    }

    public function takeAdmin($id)
    {
        try{
            $this->userService->takeAdmin($id);
        }catch (\Exception $e)
        {

        }
        return redirect()->route('users');
    }
    public function createNewUser(Request $request)
    {
        $data = $request->only(['email']);
        $result = ['status'=>200];
        try
        {
            $result['data'] = 0;
        }catch (\Exception $e)
        {
            $result =[
                'status'=>500,
                'message'=>$e->getMessage(),
            ];
        }
        return redirect()->route('login');
    }
    public function logout()
    {
        $this->userService->logout();
        return redirect()->route('login');
    }

    public function addUser()
    {
        return view('usersAdd');
    }

    public function addUserSubmit(Request $request)
    {
        $data = $request->only([
            'login',
            'name',
            'surname',
            'email',
            'password',
        ]);
        try{
            $this->userService->addNewUser($data);
        }catch (\Exception $e)
        {

        }
        return redirect()->route('users');
    }
    public function deleteUser($id)
    {
        try {
            $this->userService->deleteUser($id);
        }catch (\Exception $e)
        {

        }
        return redirect()->route('users');
    }
}
