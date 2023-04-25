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

    public function firstRunApp()
    {
        $count = $this->userRepository->count();
        if($count==0)
        {
            $this->userRepository->createFirstUser();
        }
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
}
