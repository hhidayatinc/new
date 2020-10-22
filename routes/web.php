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
Route::get('/manage', 'ArticleController@index');
Route::get('/add','ArticleController@add');
Route::post('/create','ArticleController@create');
Route::get('/editarticle/{id}','ArticleController@edit');
Route::get('/delete/{id}','ArticleController@delete');
Route::post('/update/{id}','ArticleController@update');

