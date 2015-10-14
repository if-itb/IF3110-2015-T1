<?php

use Lyz\Http\Route;

Route::get('/', 'QuestionController@index');

Route::get('/questions', 'QuestionController@getRead');

Route::get('/questions/create', 'QuestionController@getCreate');
Route::post('/questions/create', 'QuestionController@postCreate');
Route::post('/answers/create', 'AnswerController@postCreate');

Route::get('/questions/edit', 'QuestionController@getUpdate');
Route::post('/questions/edit', 'QuestionController@postUpdate');

Route::get('/questions/delete', 'QuestionController@getDelete');

Route::post('/questions/votes', 'QuestionController@postVotes');
Route::post('/answers/votes', 'AnswerController@postVotes');

