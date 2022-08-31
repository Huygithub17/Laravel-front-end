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
// Chỗ này để là /home nó không nhận, chắc trong laravel nó cái sẵn cái Auth rồi.

Route::get('/admin', 'HomeController@index');

//Route::get('/test', 'HomeController@test')->name('test');

