<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::resource('/v1/questions', v1\QuestionController::class, [
    'except' => ['create', 'edit']
]);

Route::resource('/v1/answers', v1\AnswerController::class, [
    'except' => ['create', 'edit']
]);

Route::resource('/v1/categories', v1\CategoryController::class,[
	'except' => ['create', 'edit']
]);

Route::post('/v1/authenticate', 'v1\AuthenticateController@authenticate');
Route::post('/v1/getuser', 'v1\AuthenticateController@getAuthenticatedUser');
