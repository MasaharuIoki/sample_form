<?php

use Illuminate\Support\Facades\Route;

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
// アクセス時のルーティング
Route::get('sample/vali', 'App\Http\Controllers\ValiController@index');
// フォーム送信時のルーティング
Route::post('sample/vali', 'App\Http\Controllers\ValiController@receiveData');