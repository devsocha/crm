<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }
    public function firstRunApp(): void
    {
        $count = $this->userRepository->count();
        if($count==0)
        {
            $this->userRepository->createFirstUser();
        }
    }
    public function getUsers()
    {
        return $this->userRepository->getAll();
    }

    public function giveAdmin($id): void
    {
        $this->userRepository->giveAdmin($id);
    }
    public function getUserByNameAndSurname($text)
    {
        $data = explode(' ',$text);
        if(count($data)>1)
        {
            return $this->userRepository->findUserByNameAndSurname($data['0'],$data['1']);
        }
        else
        {
            return $this->userRepository->findUserByNameAndSurname($data['0']);
        }
    }
    public function takeAdmin($id): void
    {
        $this->userRepository->takeAdmin($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function updateUserByUser(array $data)
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

    /**
     * @param array $data
     * @return bool
     */
    public function login(array $data): bool
    {
        Validator::make($data,[
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
    public function logout(): void
    {
        $this->userRepository->logout();
    }

    /**
     * @param array $data
     * @return void
     */
    public function addNewUser(array $data): void
    {
        Validator::make($data,[
            'login'=>'required',
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required | email',
            'password'=>'required'
        ]);
        $this->userRepository->addUser($data);
    }
}
