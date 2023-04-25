<?php

namespace App\Repositories;

use App\Models\User;
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
        return $this->user->attempt($data);
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
