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

Route::group(['middleware'=>'auth','prefix'=>'firma'],function (){
    Route::get('/{id}', [\App\Http\Controllers\CompanyController::class,'show'])->name('company.show');
    Route::get('/usuwanie/{id}', [\App\Http\Controllers\CompanyController::class,'destroy'])->name('company.delete');
    Route::get('/{id}/kontakt-dodawanie', [\App\Http\Controllers\ContactController::class,'create'])->name('conctact.add');
    Route::post('/kontakt-dodawanie-zatwierdzenie', [\App\Http\Controllers\ContactController::class,'store'])->name('contact.add-submit');
    Route::get('/kontakt/{id}', [\App\Http\Controllers\ContactController::class,'show'])->name('contact.show');
    Route::get('/kontakt-edytowanie/{id}', [\App\Http\Controllers\ContactController::class,'edit'])->name('contact.edit');
    Route::post('/kontakt-zatwierdzenie/{id}', [\App\Http\Controllers\ContactController::class,'update'])->name('contact.edit-submit');
    Route::get('/dodawanie', [\App\Http\Controllers\CompanyController::class,'create'])->name('companies.add');
    Route::post('/dodawanie-zatwierdzenie', [\App\Http\Controllers\CompanyController::class,'store'])->name('companies.add-submit');
    Route::get('/kontakt-usuwanie/{id}', [\App\Http\Controllers\ContactController::class,'destroy'])->name('contact.delete');
    Route::get('/edytowanie/{id}', [\App\Http\Controllers\CompanyController::class,'edit'])->name('company.edit');
    Route::post('/edytowanie-zatwierdzenie', [\App\Http\Controllers\CompanyController::class,'update'])->name('companies.edit-submit');
    Route::get('/{id}/projekt-dodaj',[\App\Http\Controllers\ProjectController::class,'create'])->name('project.add');
    Route::post('/{id}/projekt-dodaj-zatwierdzenie',[\App\Http\Controllers\ProjectController::class,'store'])->name('project.add-submit');
    Route::get('/projekt/{id}',[\App\Http\Controllers\ProjectController::class,'show'])->name('project.show');
    Route::get('/projekt-usun/{id}',[\App\Http\Controllers\ProjectController::class,'destroy'])->name('project.delete');
    Route::get('/projekt/{id}/edycja',[\App\Http\Controllers\ProjectController::class,'edit'])->name('project.edit');
    Route::post('/projekt/{id}/edycja-zatwierdzenie',[\App\Http\Controllers\ProjectController::class,'update'])->name('project.edit-submit');
    Route::get('/projekt/{id}/edycja-statusu-zakonczone',[\App\Http\Controllers\ProjectController::class,'updateStatusToEnd'])->name('project.edit-status-end');
    Route::get('/projekt/{id}/edycja-statusu-zatrzymane',[\App\Http\Controllers\ProjectController::class,'updateStatusToStopped'])->name('project.edit-status-stopped');
    Route::get('/projekt/{id}/edycja-statusu-otwarte',[\App\Http\Controllers\ProjectController::class,'updateStatusToOpen'])->name('project.edit-status-open');
    Route::post('/dodawanie-dokumentu',[\App\Http\Controllers\FileController::class,'addDocInCompany'])->name('add-file-in-company');
    Route::get('/pobieranie-dokumentu/{id}',[\App\Http\Controllers\FileController::class,'downloadFile'])->name('download-file');
    Route::get('/usuwanie-dokumentu/{id}',[\App\Http\Controllers\FileController::class,'deleteDocFromCompany'])->name('delete-file-from-company');


});
Route::group(['middleware'=>'auth','prefix'=>'ustawienia'],function () {
    Route::get('/',[\App\Http\Controllers\SettingsController::class,'index'])->name('settings');
    Route::post('/zatwierdzanie',[\App\Http\Controllers\SettingsController::class,'update'])->name('settings.update');

});

Route::group(['middleware'=>'auth','prefix'=>'admin/ustawienia'],function () {
    Route::get('/uzytkownicy',[\App\Http\Controllers\UserController::class,'usersView'])->name('users');
    Route::post('/uzytkownicy-zatwierdzenie',[\App\Http\Controllers\UserController::class,'createNewUser'])->name('users.create');
    Route::get('/uzytkownicy/nadawanie-admina/{id}',[\App\Http\Controllers\UserController::class,'giveAdmin'])->name('users.admin');
    Route::get('/uzytkownicy/nadawanie-usera/{id}',[\App\Http\Controllers\UserController::class,'takeAdmin'])->name('users.user');
    Route::post('/uzytkownicy/wyszukiwanie',[\App\Http\Controllers\UserController::class,'findUserByNameAndSurname'])->name('users.find');
    Route::get('/uzytkownicy/dodawanie',[\App\Http\Controllers\UserController::class,'addUser'])->name('users.add');
    Route::post('/uzytkownicy/dodawanie-zatwierdzenie',[\App\Http\Controllers\UserController::class,'addUserSubmit'])->name('users.add-submit');
    Route::get('/uzytkownicy/informacje/{id}',[\App\Http\Controllers\UserController::class,'userView'])->name('user.show');
    Route::get('/uzytkownicy/usuwanie/{id}',[\App\Http\Controllers\UserController::class,'deleteUser'])->name('user.delete');

});

Route::middleware('auth')->group(function (){
    Route::get('/strona-glowna', [\App\Http\Controllers\HomeController::class,'viewHomePage'])->name('home');
    Route::get('/firmy', [\App\Http\Controllers\CompanyController::class,'index'])->name('companies');
    Route::get('/kontakty', [\App\Http\Controllers\ContactController::class,'index'])->name('contacts');
    Route::get('/logout', [\App\Http\Controllers\UserController::class,'logout'])->name('logout');
    Route::post('/wyszukane-kontakty', [\App\Http\Controllers\CompanyController::class,'companiesByNameWithNoFullName'])->name('contactsBySearch');

});
