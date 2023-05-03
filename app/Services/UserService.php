<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }
    public function firstRunApp()
    {
        $count = $this->userRepository->count();
        if($count==0)
        {
            $this->userRepository->createFirstUser();
        }
    }

    public function updateUserByUser($data)
    {
        Validator::make($data,[
            'login'=>'required',
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required | email',
        ]);
        if(isset($data['password']))
        {
            Validator::make($data,[
                'password'=>'required',
                'reTypePassword'=>'required | same:password',
            ]);
            $this->userRepository->updatePassword($data);
        }
        return $this->userRepository->updateUserByUser($data);

    }
    public function login($data)
    {
        $validator= Validator::make($data,[
            'login'=>'required',
            'password'=>'required',
        ]);
        if($this->userRepository->login($data))
        {
            $message = true;
        }else
        {
            $message =  false;
        }
        return $message;
    }
    public function logout()
    {
        $this->userRepository->logout();
    }
}
