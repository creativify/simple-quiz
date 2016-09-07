<?php

Auth::routes();
Route::get('/', 'RootController@index');
Route::get('/home', 'HomeController@index');
Route::get('/quizzes', 'QuizController@index');
Route::get('/quizzes/{id}', 'QuizController@show');
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', 'AdminController@index')->name('adminroot');
    Route::get('/quizzes', 'AdminController@showQuizzes')->name('adminquizzes');
    Route::get('/users', 'AdminController@showUsers')->name('adminusers');
    Route::get('/categories', 'AdminController@showCategories')->name('admincategories');
    Route::resource('/quiz', 'AdminQuizController', ['only' => [
        'show', 'store', 'update', 'destroy'
    ]]);
    Route::resource('/category', 'AdminCategoryController', ['only' => [
        'store', 'update', 'destroy'
    ]]);
});