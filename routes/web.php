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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('categorias','CategoryController@index')->name('categories')->middleware('auth');
    
Route::get('categories', 'CategoryController@show')->name('categories.show');

Route::post('categories', 'CategoryController@store')->name('categories.store');

Route::put('categories/{category}', 'CategoryController@edit')->name('categories.edit');
    
Route::delete('categories/{category}', 'CategoryController@destroy')->name('categories.destroy');


Route::get('produtos', 'ProductController@index')->name('products')->middleware('auth');

Route::get('products', 'ProductController@show')->name('products.show');

Route::post('products', 'ProductController@store')->name('products.store');

Route::put('products/{product}', 'ProductController@edit')->name('products.edit');

Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');
