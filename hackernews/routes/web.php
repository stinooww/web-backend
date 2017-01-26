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


Route::get('/articles/{articles}/delete','ArticleController@delete');
Route::get('/articles/{articles}/deleteconf','ArticleController@deletearticleconfirm');
Route::get('/articles/{articles}/cancel','ArticleController@delartcancel');

Route::get('/comments/{comments}/deletecomment','CommentController@deleteComment');
Route::get('/comments/{comments}/delete','CommentController@delete');
Route::get('/comments/{comments}/cancelComment','CommentController@cancelComment');


Route::resource('articles','ArticleController');
Route::resource('comments','CommentController');
//Route::get('/home', 'HomeController@index');
Auth::routes();