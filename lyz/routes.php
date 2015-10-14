<?php

use Lyz\Http\Route;

Route::get('/', 'QuestionController@index');
Route::get('/questions/create', 'QuestionController@getCreate');
Route::post('/questions/create', 'QuestionController@postCreate');
Route::get('/questions/delete', 'QuestionController@getDelete');
