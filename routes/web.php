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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Produtos
Route::resource('/home/products','Management\ProductController');
Route::get('home/products/{id}/delete','Management\ProductController@destroy')->name('products.destroy');

//Usuarios
Route::resource('/home/users','Management\UserController');

//Categorias
Route::resource('home/categories','Management\CategoryController');
Route::get('home/categories/{id}/delete','Management\CategoryController@destroy')->name('categories.destroy');