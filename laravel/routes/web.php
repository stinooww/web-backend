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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get("about", function(){
//    return view('about');
//});
Route::get('/','HomeController@index');
Route::get('contact','HomeController@contact');

//Route::get('articles','ArticlesController@index');
//Route::get('articles/create','ArticlesController@create');
//Route::get('articles/{id}','ArticlesController@show');
//
//Route::post('articles','ArticlesController@store');
Route::resource('articles','ArticlesController');
//Route::get('articles/{id}/edit','ArticlesController@edit');
//Route::controllers([
//    'auth'=> 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);
Auth::routes();

//Route::get('/home', 'HomeController@index');
