<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function viewLoginPage()
    {
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
            $result['data'] = $this->userService;
        }catch (\Exception $e)
        {
            $result = [
                'status'=>500,
                'message'=>$e->getMessage(),
            ];
        }
        return redirect()->route('home');
    }
}
