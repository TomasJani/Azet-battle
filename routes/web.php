<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Company Routes
Route::get('company', 'CompanyController@create');
Route::patch('company', 'CompanyController@store');
Route::patch('company/login', 'CompanyController@store');
Route::get('{company}/company', 'CompanyController@show');
Route::get('{company}/edit', 'CompanyController@edit');
Route::patch('{company}/update', 'CompanyController@update');

Route::get('{company}/company/search', 'CompanyController@search');

//Comment Routes
Route::post('{company}/question/comment', 'CommentController@storeQuestion');
Route::post('{company}/answer/comment', 'CommentController@storeAnswer');
Route::patch('{company}/comment/edit', 'CommentController@storeAnswer');
Route::delete('{company}/comment/delete/{comment}', 'QuestionController@destroy');

//Question Routes
Route::get('{company}/question/{question}', 'QuestionController@show');
Route::get('{company}/question/{question}/edit', 'QuestionController@edit');
Route::patch('{company}/question/{question}', 'QuestionController@update');
Route::delete('{company}/question/{question}', 'QuestionController@destroy');

Route::get('{company}/question/{question}/search', 'QuestionController@search');

Route::post('{company}/question', 'QuestionController@store');

//Answer Routes
Route::post('{company}/answers', 'AnswerController@store');
Route::delete('{company}/answers/delete/{answers}', 'AnswerController@destroy');









