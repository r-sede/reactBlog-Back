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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles/create', 'ArticleController@create')->middleware('auth');

Route::post('/articles','ArticleController@store')->middleware('auth')->name('articles');

Route::post('/articles/{article}','ArticleController@update')->middleware('auth');

Route::delete('/articles/{article}','ArticleController@delete')->middleware('auth');

