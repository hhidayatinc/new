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
Route::get('/', function(){
   return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@getByAll');
Route::get('/home/{article}', 'HomeController@getById');
Route::get('/about', 'AboutController@index');
Route::get('/article/{id}', 'ArticleController@getById');
Route::post('/article/{id}', 'ArticleController@insertData');
Route::get('/article', 'ArticleController@getAll');

//Route::get('/login', 'LoginController@login')->name('login');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/login', 'LoginController@login')->name('login');
// Route::get('/register', 'RegisterController@__construct')->name('register');
