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

Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@profile')->name('profile');

Route::get('/upload', 'AudiosController@upload')->name('upload');
Route::get('/audio/show/{id}', 'AudiosController@show')->name('show.audio');
Route::get('/find', 'AudiosController@finder')->name('find');
Route::get('/hire', 'HireController@hire')->name('hire');

Route::get('/bundles', 'BundlesController@bundles')->name('bundles');
Route::get('/bundle/add', 'BundlesController@bundleAdd')->name('bundle.add');
Route::post('/bundle/save', 'BundlesController@save')->name('bundle.save');
Route::get('/bundle/show/{id}', 'BundlesController@show')->name('bundle.show');

Route::post('/save', 'AudiosController@save')->name('save');
Route::get('/delete/{id}', 'AudiosController@delete')->name('delete');

Route::get('/test', 'Audio\AudioController@test')->name('test');
Route::get('/user/{id}', 'UserController@show')->name('users.show');

Auth::routes();