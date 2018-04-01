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
})->name('home');

//home route
Route::Get('/about', 'HomeController@about');

// product routes
Route::get('bordspellen', 'ProductController@boardGames')->name('boardgames');
Route::get('puzzels', 'ProductController@puzzles')->name('puzzles');


// auth routes
Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// cart routes
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/add/{productId}', 'CartController@add');
Route::get('/cart/destroy/{id}', 'CartController@destroy');

// order routes
Route::get('/orders', 'OrderController@index')->name('orders');
Route::post('/cart/save', 'OrderController@makeOrder');
Route::Get('/orders/show', 'OrderController@userShow');

// product admin routes
Route::get('/admin/products', 'ProductController@adminIndex')->name('products');
Route::get('/admin/products/edit/{id}', 'ProductController@edit')->name('edit_product');
Route::get('/admin/products/destroy/{id}', 'ProductController@destroy');
Route::post('/admin/products/editsave', 'ProductController@save');
Route::get('/admin/products/create', 'ProductController@newProduct')->name('new_product');
Route::post('/admin/product/save', 'ProductController@add');

// admin page
Route::get('/admin', 'HomeController@admin')->name('admin');

// category admin routes
Route::Get('/admin/categories', 'CategoryController@index')->name('categories');
Route::Get('/admin/categories/new', 'CategoryController@new')->name('new_category');
Route::post('/admin/categories/add', 'CategoryController@add');
Route::get('/admin/categories/edit/{id}', 'CategoryController@edit')->name('edit_category');
Route::get('/admin/categories/destroy/{id}', 'CategoryController@destroy');
Route::post('/admin/categories/save', 'CategoryController@save');

// order admin routes
Route::Get('/admin/orders/destroy', 'OrderController@destroy');
Route::Get('/admin/orders', 'OrderController@adminIndex')->name('orders');
Route::Get('/admin/orders/show', 'OrderController@show')->name('show_order');