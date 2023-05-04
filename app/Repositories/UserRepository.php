<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login($data): bool
    {
        return Auth::attempt($data);
    }
    public function logout(): void
    {
         Auth::logout();
    }
    public function getUserByMail($mail)
    {
        return $this->user->where('email',$mail)->first();
    }

    public function getUserById($id)
    {
        return $this->user->where('id',$id)->first();
    }
    public function count()
    {
        return $this->user->count();
    }
    public function updateUserByUser($data)
    {
        $user = $this->user->where('id',$data['id'])->first();
        $user->login = $data['login'];
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->save();
        return $user->fresh();
    }

    public function giveAdmin($id): void
    {
        $user = $this->user->where('id',$id)->first();
        $user->role = 1;
        $user->save();
    }
    public function takeAdmin($id): void
    {
        $user = $this->user->where('id',$id)->first();
        $user->role = 0;
        $user->save();
    }

    public function findUserByNameAndSurname($name = null, $surname = null)
    {
        return $this->user->where('name','LIKE','%'.$name.'%')->where('surname','LIKE','%'.$surname.'%')->paginate(5);
    }
    public function getAll()
    {
        return $this->user->paginate(5);
    }
    public function updateTokenByMail($email,$token): void
    {
        $user = $this->user->where('email',$email)->first();
        $user->token = $token;
        $user->save();
    }
    public function updatePassword($data): void
    {
        $user = $this->user->where('id',$data['id'])->first();
        $user->password = Hash::make($data['password']);
        $user->save();
    }
    public function createFirstUser(): void
    {
       $user = $this->user;
       $user->login = 'admin';
       $user->password = Hash::make('admin');
       $user->role = 1;
       $user->save();
    }

    public function addUser($data): void
    {
        $user = $this->user;
        $user->login = $data['login'];
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->password = Hash::make( $data['password']);
        $user->role = 0;
        $user->save();
    }
}
