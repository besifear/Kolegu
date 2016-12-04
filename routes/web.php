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

Route::get('/', 'PagesController@getIndex');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/order/{orderBy}','HomeController@filter',compact('orderBy'));

Route::resource('posts','PostController');

Route::resource('categories','CategoryController');

Route::resource('questions','QuestionController');
