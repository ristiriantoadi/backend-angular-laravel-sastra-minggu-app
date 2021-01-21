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

Route::get('/', function () {
    return view('welcome');
});


Route::post("/register/user",'App\Http\Controllers\Auth\RegisterController@registerUser');
Route::post("/login",'App\Http\Controllers\Auth\LoginController@login');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function(){

    return response()->json([
        'id' => Auth::user()->id,
        'namaLengkap' => Auth::user()->nama_lengkap,
        'username' => Auth::user()->username,
        'role' => Auth::user()->role
    ]);
})->name('home');

Route::get('/logout', function(){
    Auth::logout();
    return "logged out";
})->name('logout');