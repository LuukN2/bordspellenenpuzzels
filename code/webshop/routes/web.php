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

// product routes
Route::get('bordspellen', 'ProductController@boardGames');
Route::get('puzzels', 'ProductController@puzzles');


// auth routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// cart routes
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/add/{productId}', 'CartController@add');
Route::get('/cart/destroy/{id}', 'CartController@destroy');

// order routes
Route::get('/orders', 'OrderController@index');
Route::post('/cart/save', 'OrderController@makeOrder');

// product admin routes
Route::get('/admin/products', 'ProductController@adminIndex');
Route::get('/admin/products/edit/{id}', 'ProductController@edit');
Route::get('/admin/products/destroy/{id}', 'ProductController@destroy');
Route::post('/admin/products/editsave', 'ProductController@save');
Route::get('/admin/products/create', 'ProductController@newProduct');
Route::post('/admin/product/save', 'ProductController@add');

// admin page
Route::get('/admin', 'HomeController@admin');

// category admin routes
Route::Get('/admin/categories', 'CategoryController@index');
Route::Get('/admin/categories/new', 'CategoryController@new');
Route::post('/admin/categories/add', 'CategoryController@add');
Route::get('/admin/categories/edit/{id}', 'CategoryController@edit');
Route::get('/admin/categories/destroy/{id}', 'CategoryController@destroy');
Route::post('/admin/categories/save', 'CategoryController@save');