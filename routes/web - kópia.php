<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('company', 'CompanyController@create');
Route::patch('company', 'CompanyController@store');
Route::get('{company}/company', 'CompanyController@show');
Route::get('{company}/edit', 'CompanyController@edit');
Route::patch('{company}/update', 'CompanyController@update');

Route::post('{company}/question/comment', 'CommentController@storeQuestion');
Route::post('{company}/answer/comment', 'CommentController@storeAnswer');
Route::patch('{company}/comment/edit', 'CommentController@storeAnswer');
Route::delete('{company}/comment/delete/{comment}', 'QuestionController@destroy');




