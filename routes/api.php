<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/laporan_pemuatan',  'App\\Http\\Controllers\\LaporanPemuatanController@getEntri');

Route::middleware('auth:sanctum')->post('/laporan_pemuatan/add', 'App\\Http\\Controllers\\LaporanPemuatanController@addEntri');
Route::middleware('auth:sanctum')->get('/laporan_pemuatan/add/get_list_pengarang', 'App\\Http\\Controllers\\LaporanPemuatanController@getPengarang');
Route::middleware('auth:sanctum')->post('/laporan_pemuatan/delete', 'App\\Http\\Controllers\\LaporanPemuatanController@deleteEntri');
Route::middleware('auth:sanctum')->get('/laporan_pemuatan/edit', 'App\\Http\\Controllers\\LaporanPemuatanController@getEntriEdit');
// Route::post('/laporan_pemuatan/add', 'App\\Http\\Controllers\\LaporanPemuatanController@addEntri');

// Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
