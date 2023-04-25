<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [\App\Http\Controllers\UserController::class,'viewLoginPage'])->name('login');
Route::post('/login/submit', [\App\Http\Controllers\UserController::class,'loginSubmit'])->name('login-submit');
