<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $id = Auth::user()->id;
        $user = $this->userService->getUserById($id);
        return view('settings')->with(['user'=>$user]);
    }

    public function update(Request $request)
    {
        $data = $request->only([
            'login',
            'name',
            'surname',
            'email',
            'password',
            'reTypePassword'
        ]);
        $data['id'] = Auth::user()->id;
        try{
            $result = $this->userService->updateUserByUser($data);
        }catch (\Exception $e)
        {
        }
        return view('settings')->with(['user'=>$result]);

    }
}
