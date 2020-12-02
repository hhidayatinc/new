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

Route::get('/news', 'NewsController@index');
Auth::routes();

Route::get('/home', 'HomeController@getByAll');
Route::get('/home/{article}', 'HomeController@getById');
Route::get('/about', 'HomeController@about');
Route::get('/article/{id}', 'HomeController@getById');
Route::get('manage/article/{id}', 'HomeController@getById');
Route::get('manage/article/{id}', 'HomeController@insertData');
Route::post('/article/{id}', 'HomeController@insertData');
Route::get('/manage/search1', 'HomeController@search1');
Route::get('/manage/search2', 'ArticleController@search2');


Route::group(['middleware' =>['auth']], function(){
   Route::get('/editarticle/{id}','ArticleController@edit');
   Route::post('/update/{id}','ArticleController@update');
   });
   
Route::resource('articles','ArticleController')->middleware('auth');
Route::get('/manage', 'ArticleController@index')->name('manage');
Route::get('/create','ArticleController@create');
Route::post('/store','ArticleController@store');
Route::get('/destroy/{id}','ArticleController@destroy');
Route::get('/print','ArticleController@print');



