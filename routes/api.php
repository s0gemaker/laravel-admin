<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::apiResource('users', 'App\Http\Controllers\UserController');
//Route::get('users/{id}', 'App\Http\Controllers\UserController@show');
//Route::post('users', 'App\Http\Controllers\UserController@store');
//Route::put('users/{id}', 'App\Http\Controllers\UserController@update');
//Route::delete('users/{id}', 'App\Http\Controllers\UserController@destroy');
