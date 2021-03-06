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

Route::get('/laporan_pemuatan',  'App\\Http\\Controllers\\LaporanPemuatanController@getEntri');
Route::get('/laporan_pemuatan/add/get_list_pengarang', 'App\\Http\\Controllers\\LaporanPemuatanController@getPengarang');
Route::get('/laporan_pemuatan/edit', 'App\\Http\\Controllers\\LaporanPemuatanController@getEntriEdit');
Route::get('/laporan_pemuatan/search', 'App\\Http\\Controllers\\LaporanPemuatanController@searchEntris');
Route::get('/laporan_pemuatan/user/{id}', 'App\\Http\\Controllers\\LaporanPemuatanController@getEntrisUserPengarang')->middleware('auth:sanctum');
Route::post('/laporan_pemuatan/delete', 'App\\Http\\Controllers\\LaporanPemuatanController@deleteEntri')->middleware('auth:sanctum');
Route::post('/laporan_pemuatan/add', 'App\\Http\\Controllers\\LaporanPemuatanController@addEntri')->middleware('auth:sanctum');
Route::post('/laporan_pemuatan/edit', 'App\\Http\\Controllers\\LaporanPemuatanController@editEntri')->middleware('auth:sanctum');

Route::get('/user/notifications', 'App\\Http\\Controllers\\NotificationController@index')->middleware('auth:sanctum')->middleware('auth:sanctum');
Route::post('/user/notifications', 'App\\Http\\Controllers\\NotificationController@readNotifications')->middleware('auth:sanctum')->middleware('auth:sanctum');
