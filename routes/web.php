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

Route::get('/', 'QuestionController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/profile',function(){
	return view('pages.profile');
});

Route::get('/order/{orderBy}','QuestionController@filter',compact('orderBy'));

Route::resource('posts','PostController');

Route::resource('categories','CategoryController');

Route::resource('questions','QuestionController');

Route::resource('questionsev','QuestionEvaluationController');

Route::resource('answers','AnswerController');

Route::resource('users','UserController');

Route::get('Kategorite','CategoryController@seeCategories');

Route::post('Kategorite/{category_id}','CategoryController@selectCategory',compact('category_id'));

Route::post('questionupvote','QuestionEvaluationController@upVote');

Route::post('questiondownvote','QuestionEvaluationController@downVote');

Route::post('answerupvote','AnswerEvaluationController@upVote');

Route::post('answerdownvote','AnswerEvaluationController@downVote');
