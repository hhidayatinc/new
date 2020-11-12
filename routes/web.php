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

Route::resource('articles','UploadController')->middleware('auth');
Route::get('/create','UploadController@create');
Route::post('/store','UploadController@store');
Route::get('/destroy/{id}','UploadController@destroy');
Route::get('/editarticle/{id}','UploadController@edit');
Route::post('/update/{id}','UploadController@update');
Route::get('/article/{id}', 'UploadController@show');
Route::post('/article/{id}', 'UploadController@komen');
Route::get('/manage', 'UploadController@index')->name('manage');
Route::get('/print','UploadController@print');

