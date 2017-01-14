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

Route::get('/upload',function(){
	return view('pages.upload');
});

Route::get('/order/{orderBy}','QuestionController@filter',compact('orderBy'));

Route::resource('posts','PostController');

Route::resource('categories','CategoryController');

Route::resource('questions','QuestionController');

Route::resource('questionsev','QuestionEvaluationController');

Route::resource('answers','AnswerController');

Route::resource('users','UserController');

Route::resource('messages', 'MessageController');

Route::resource('suggestions','SuggestionController');

Route::resource('resources','ResourceController');

Route::post('deletemessages','MessageController@destroyAll');

Route::post('markasread','MessageController@markAsRead');

Route::post('messagesorderby','MessageController@orderMessagesBy');

Route::get('Kategorite','CategoryController@seeCategories');

Route::post('Kategorite/{category_id}','CategoryController@selectCategory',compact('category_id'));

Route::post('questionupvote','QuestionEvaluationController@upVote');

Route::post('questiondownvote','QuestionEvaluationController@downVote');

Route::post('answerupvote','AnswerEvaluationController@upVote');

Route::post('answerdownvote','AnswerEvaluationController@downVote');

Route::get('sendEmail', 'UserController@sendEmail');



//TEST

	
	Route::get('fileentry', 'FileEntryController@index');
	Route::get('fileentry/get/{filename}', [
			'as' => 'getentry', 'uses' => 'ResourceController@get']);
	Route::post('fileentry/add', [ 
		    'as' => 'addentry', 'uses' => 'FileEntryController@add']);
	


//END TEST
