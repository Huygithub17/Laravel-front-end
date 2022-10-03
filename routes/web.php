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

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/category/{id}', [
    'as' => 'category.product',
    'uses' => 'CategoryController@index'
]);

Route::prefix('cart')->group(function () {
    Route::get('/add-to-cart/{id}', [
        'as' => 'cart.add',
        'uses' => 'CartController@add'
    ]);

    Route::get('/show-cart', [
        'as' => 'cart.show',
        'uses' => 'CartController@show'
    ]);

    Route::get('/update-cart', [
        'as' => 'cart.update',
        'uses' => 'CartController@update'
    ]);

    Route::get('/delete-cart', [
        'as' => 'cart.delete',
        'uses' => 'CartController@delete'
    ]);

    Route::get('/delete-all-cart', [
        'as' => 'cart.deleteAll',
        'uses' => 'CartController@deleteAll'
    ]);

    Route::get('/check-out-form', [
        'as' => 'cart.checkOutForm',
        'uses' => 'CartController@checkOutForm'
    ]);

    Route::post('/check-out', [
        'as' => 'cart.checkOut',
        'uses' => 'CartController@checkOut'
    ]);
});


