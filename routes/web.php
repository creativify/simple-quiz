<?php

Auth::routes();
Route::get('/', 'RootController@index');
Route::get('/home', 'HomeController@index');
Route::get('/quizzes', 'QuizController@index');
Route::get('/quizzes/{id}', 'QuizController@show');
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');
Route::get('/admin', 'Admin\AdminController@index');