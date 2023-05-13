<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('company/{id}','\App\Api\V1\CompanyController@getCompany');
Route::get('companies','\App\Api\V1\CompanyController@getAllCompanies');
Route::post('company-add','\App\Api\V1\CompanyController@addCompany');
Route::put('company-update','\App\Api\V1\CompanyController@updateCompany');
