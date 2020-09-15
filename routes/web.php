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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@profile')->name('profile');

Route::get('/upload', 'AudiosController@upload')->name('upload');

Route::post('/save', 'AudiosController@save')->name('save');

Route::get('/test', 'Audio\AudioController@test')->name('test');