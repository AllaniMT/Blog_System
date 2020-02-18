<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Show all articles
Route::get('articles','ArticleController@index');

//Show only one article
Route::get('article/{id}','ArticleController@show');

//Create new article
Route::post('article','ArticleController@store');

//Update article
Route::put('article','ArticleController@store');

//Delete article
Route::delete('article/{id}','ArticleController@destroy');



