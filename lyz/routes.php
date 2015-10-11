<?php

use Lyz\Http\Route;

Route::get('/', 'QuestionController@index');
Route::get('/ask', 'QuestionController@getCreate');
