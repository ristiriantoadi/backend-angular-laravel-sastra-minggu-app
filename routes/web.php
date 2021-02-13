<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//spa routes
Route::get('/', function() {
    return File::get(public_path() . '/build/index.html');
  });
Route::get('/admin/{path?}', function() {
    return File::get(public_path() . '/build/index.html');
  });
Route::get('/user/{path?}', function() {
    return File::get(public_path() . '/build/index.html');
  });

Auth::routes();

//helper routes
Route::post("/register/user",'App\Http\Controllers\Auth\RegisterController@registerUser');
Route::post("/login",'App\Http\Controllers\Auth\LoginController@login');
Route::get('/logout', function(){
    Auth::logout();
    return "logged out";
})->name('logout');