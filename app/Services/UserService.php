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

    public function login($data)
    {
        $validator= Validator::make($data,[
            'login'=>'required',
            'password'=>'required',
        ]);
        if($this->userRepository->login($data))
        {
            $message = 'Poprawnie zalogowany';
        }else
        {
            $message =  'Błędne dane logowania';
        }
        return $message;
    }
}
