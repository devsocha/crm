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

Route::get('/', [\App\Http\Controllers\UserController::class,'viewLoginPage'])->name('login');
Route::post('/login/submit', [\App\Http\Controllers\UserController::class,'loginSubmit'])->name('login-submit');
Route::get('/restart-hasla', [\App\Http\Controllers\UserController::class,'restartPasswordView'])->name('password.restart');
Route::post('/restart-hasla', [\App\Http\Controllers\UserController::class,'restartPassword'])->name('password.restart-submit');



Route::middleware('auth')->group(function (){
    Route::get('/logout', [\App\Http\Controllers\UserController::class,'logout'])->name('logout');

});
Route::get('/strona-glowna', [\App\Http\Controllers\HomeController::class,'viewHomePage'])->name('home');
Route::get('/firmy', [\App\Http\Controllers\CompanyController::class,'index'])->name('companies');
Route::get('/kontakty', [\App\Http\Controllers\ContactController::class,'index'])->name('contacts');
Route::get('/firmy-dodawanie', [\App\Http\Controllers\CompanyController::class,'create'])->name('companies.add');
Route::post('/firmy-dodawanie-zatwierdzenie', [\App\Http\Controllers\CompanyController::class,'store'])->name('companies.add-submit');
Route::get('/firma/{id}', [\App\Http\Controllers\CompanyController::class,'show'])->name('company.show');
Route::get('/firma-edytowanie/{id}', [\App\Http\Controllers\CompanyController::class,'edit'])->name('company.edit');
Route::post('/firmy-edytowanie-zatwierdzenie', [\App\Http\Controllers\CompanyController::class,'update'])->name('companies.edit-submit');
