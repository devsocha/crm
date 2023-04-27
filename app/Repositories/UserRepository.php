<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login($data)
    {
        return Auth::attempt($data);
    }
    public function logout()
    {
         Auth::logout();
    }
    public function getUserByMail($mail)
    {
        return $this->user->where('email',$mail)->first();
    }
    public function count()
    {
        return $this->user->count();
    }

    public function createFirstUser()
    {
       $user = $this->user;
       $user->login = 'admin';
       $user->password = Hash::make('admin');
       $user->role = 1;
       $user->save();
    }
}
