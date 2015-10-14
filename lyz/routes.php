<?php

use Lyz\Http\Route;

Route::get('/', 'QuestionController@index');

Route::get('/questions', 'QuestionController@getRead');

Route::get('/questions/create', 'QuestionController@getCreate');
Route::post('/questions/create', 'QuestionController@postCreate');
Route::post('/answers/create', 'AnswerController@postCreate');

Route::get('/questions/delete', 'QuestionController@getDelete');

