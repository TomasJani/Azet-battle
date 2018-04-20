<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Question Routes
Route::get('{company}/question/{question}', 'QuestionController@show');
Route::get('{company}/question/{question}', 'QuestionController@edit');
Route::patch('{company}/question/{question}', 'QuestionController@update');
Route::delete('{company}/question/{question}', 'QuestionController@destroy');

Route::get('{company}/question/{question}/search', 'QuestionController@search');

Route::post('{company}/question', 'QuestionController@store');





