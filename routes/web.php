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

Route::get('langs/{locale}', function ($locale) {

    if (! in_array($locale, ['en', 'es'])) {
        abort(400);
    }

    // App::setLocale($locale);

});

Route::get('/', function () {
    return view('welcome', ['title' => trans('messages.home_title')]);
})->name("home.welcome");

Route::get('/login', function () {
    return view('welcome', ['title' => trans('messages.login_title')]);
})->name("home.login");

Route::get('/signup', function () {
    return view('welcome', ['title' => trans('messages.signup_title')]);
})->name("home.signup");

Route::get('/index', 'HomeController@index')->name("home.index");
Route::get('/contact', 'HomeController@contact')->name("home.contact");
Route::get('/audios', 'AudioController@audios')->name("home.audios");
Route::get('/audio/create', 'AudioController@create')->name("audio.create");
Route::get('/audio/show/{id}', 'AudioController@show')->name("audio.show");
Route::get('/audio/list', 'AudioController@list')->name("audio.list");
Route::get('/audio/delete/{id}', 'AudioController@delete')->name("audio.delete");
Route::post('/audio/save', 'AudioController@save')->name("audio.save");
Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
Route::get('/product/create', 'ProductController@create')->name("product.create");
Route::get('/product/saved/{id}', 'ProductController@saved')->name("product.saved");
Route::post('/product/save', 'ProductController@save')->name("product.save");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
