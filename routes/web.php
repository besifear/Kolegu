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

//Home Controllers

Route::get('/', 'QuestionController@index');

Auth::routes();

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'SocialController@getSocialHandle']);


Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'QuestionController@index');
//End Home Controllers
//////////////
//Question Controllers 

Route::resource('questions','QuestionController');

//End Question Controller
/////////////////

Route::get('/test', 'QuestionController@test');

Route::get('/order/{orderBy}','QuestionController@filter',compact('orderBy'));

Route::get('/orderresources/{orderBy}','ResourceController@filter',compact('orderBy'));

Route::resource('posts','PostController');

Route::resource('categories','CategoryController');

Route::resource('questionsev','QuestionEvaluationController');

Route::resource('answers','AnswerController');

Route::resource('users','UserController');

Route::resource('resources','ResourceController');

Route::resource('resourcereplies','ResourceReplyController');

Route::resource('resourceevaluations','ResourceEvaluationController');

Route::resource('resourcereplyevaluations','ResourceReplyEvaluationController');

Route::post('resourcereplyupvote','ResourceReplyEvaluationController@upVote' );

Route::post('resourcereplydownvote','ResourceReplyEvaluationController@downVote' );

Route::post('resourceupvote','ResourceEvaluationController@upVote' );

Route::post('resourcedownvote','ResourceEvaluationController@downVote' );

Route::get('sendemailtousers','MessageController@emailallusers');

Route::resource('messages', 'MessageController');

Route::resource('suggestions','SuggestionController');

Route::resource('resources','ResourceController');

Route::resource('achievements','AchievementController');

Route::post('deletemessages','MessageController@destroyAll');

Route::post('markasread','MessageController@markAsRead');

Route::post('messagesorderby','MessageController@orderMessagesBy');

Route::get('Kategorite','CategoryController@seeCategories')->name('Kategorite');

Route::post('Kategorite/{category_id}','CategoryController@selectCategory',compact('category_id'));

Route::post('questionupvote','QuestionEvaluationController@upVote');

Route::post('questiondownvote','QuestionEvaluationController@downVote');

Route::post('answerupvote','AnswerEvaluationController@upVote');

Route::post('answerdownvote','AnswerEvaluationController@downVote');

Route::get('sendEmail', 'UserController@sendEmail');

Route::get('searches', 'SearchController@searchForJSON');

Route::post('searches', ['as' => 'searches', 'uses' => 'SearchController@search']);

Route::post('searchusers', ['as' => 'searchusers', 'uses' => 'SearchController@searchusers']);

Route::post('profile', 'UserController@update_avatar');

Route::get('/upload',function(){
	return view('pages.upload');
});

//TEST

	
	Route::get('fileentry', 'FileEntryController@index');
	Route::get('fileentry/get/{filename}', [
			'as' => 'getentry', 'uses' => 'ResourceController@get']);
	Route::post('fileentry/add', [ 
		    'as' => 'addentry', 'uses' => 'FileEntryController@add']);
	

	

	Route::get('/upload',function(){
		return view('pages.upload');
	});
//END TEST

Route::get('/restest', function(){
	return view('restest');
});