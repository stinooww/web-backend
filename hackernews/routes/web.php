<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//
//Route::get('/', function () {
//    return view('articles');
//});
Route::get('/', 'ArticleController@index');

Route::resource('articles','ArticleController');
Route::resource('comments','CommentController');
//Route::get('/home', 'HomeController@index');
Auth::routes();