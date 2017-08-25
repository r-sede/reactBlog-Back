<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('months', 'ArticleController@getMonths');

Route::get('articles', 'ArticleController@index');

Route::get('articlesAfter/{date}', 'ArticleController@articlesAfter');

Route::get('articles/{article}','ArticleController@show');

Route::post('articles','ArticleController@store')->middleware('auth');

Route::post('articles/{article}','ArticleController@update')->middleware('auth');

Route::delete('articles/{article}','ArticleController@delete')->middleware('auth');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
