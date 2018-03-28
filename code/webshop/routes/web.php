<?php

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

Route::get('products', 'ProductController@index');
Route::get('/admin/products/create', 'ProductController@newProduct');
Route::post('/admin/product/save', 'ProductController@add');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/add/{productId}', 'CartController@add');
Route::post('/cart/save', 'OrderController@makeOrder');