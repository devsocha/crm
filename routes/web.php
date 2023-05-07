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
Route::get('/firma-usuwanie/{id}', [\App\Http\Controllers\CompanyController::class,'destroy'])->name('company.delete');
Route::get('/firma/{id}/kontakt-dodawanie', [\App\Http\Controllers\ContactController::class,'create'])->name('conctact.add');
Route::post('/firma/kontakt-dodawanie-zatwierdzenie', [\App\Http\Controllers\ContactController::class,'store'])->name('contact.add-submit');
Route::get('/firma/kontakt/{id}', [\App\Http\Controllers\ContactController::class,'show'])->name('contact.show');
Route::get('/firma/kontakt-edytowanie/{id}', [\App\Http\Controllers\ContactController::class,'edit'])->name('contact.edit');
Route::post('/firma/kontakt-zatwierdzenie/{id}', [\App\Http\Controllers\ContactController::class,'update'])->name('contact.edit-submit');
Route::get('/firma/kontakt-usuwanie/{id}', [\App\Http\Controllers\ContactController::class,'destroy'])->name('contact.delete');
Route::post('/wyszukane-kontakty', [\App\Http\Controllers\CompanyController::class,'companiesByNameWithNoFullName'])->name('contactsBySearch');
Route::get('/ustawienia',[\App\Http\Controllers\SettingsController::class,'index'])->name('settings');
Route::post('/ustawienia-zatwierdzanie',[\App\Http\Controllers\SettingsController::class,'update'])->name('settings.update');
Route::get('/ustawienia-uzytkownicy',[\App\Http\Controllers\UserController::class,'usersView'])->name('users');
Route::post('/ustawienia-uzytkownicy-zatwierdzenie',[\App\Http\Controllers\UserController::class,'createNewUser'])->name('users.create');
Route::get('/ustawienia-uzytkownicy/nadawanie-admina/{id}',[\App\Http\Controllers\UserController::class,'giveAdmin'])->name('users.admin');
Route::get('/ustawienia-uzytkownicy/nadawanie-usera/{id}',[\App\Http\Controllers\UserController::class,'takeAdmin'])->name('users.user');
Route::post('/ustawienia-uzytkownicy/wyszukiwanie',[\App\Http\Controllers\UserController::class,'findUserByNameAndSurname'])->name('users.find');
Route::get('/ustawienia-uzytkownicy/dodawanie',[\App\Http\Controllers\UserController::class,'addUser'])->name('users.add');
Route::post('/ustawienia-uzytkownicy/dodawanie-zatwierdzenie',[\App\Http\Controllers\UserController::class,'addUserSubmit'])->name('users.add-submit');
Route::get('/ustawienia-uzytkownicy/informacje/{id}',[\App\Http\Controllers\UserController::class,'userView'])->name('user.show');
Route::get('/ustawienia-uzytkownicy/usuwanie/{id}',[\App\Http\Controllers\UserController::class,'deleteUser'])->name('user.delete');
