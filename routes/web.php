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

Route::get('/index', 'HomeController@index')->name("home.index");
Route::get('/contact', 'HomeController@contact')->name("home.contact");
Route::get('/audios', 'HomeController@audios')->name("home.audios");
Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
Route::get('/product/create', 'ProductController@create')->name("product.create");
Route::get('/product/saved/{id}', 'ProductController@saved')->name("product.saved");
Route::post('/product/save', 'ProductController@save')->name("product.save");
