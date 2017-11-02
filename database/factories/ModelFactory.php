<?php

use App\User;
use App\Answer;
use App\Question;
use App\Category;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'nickname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'reputation' => 0,
        'role' => $faker->boolean(5) ? 'Admin' : 'User',
        'rank' => 'undefined'
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker){

    return  [
        'title' => $faker->company,
        'content' => $faker->paragraphs(1, true),
        'category_id' => $faker->numberBetween(1, Category::all()->count()),
        'user_id' => $faker->numberBetween(1, User::all()->count()),
        'votes' => 0,
		'answer_id' => null
    		
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->company,
        'description' => substr($faker->paragraphs(1, true), 0 , 20),
        'parent_id' => $faker->boolean(80) ? null : $faker->numberBetween(1, Category::all()->count()) 
    ];
});

$factory->define(App\QuestionEvaluation::class, function (Faker\Generator $faker){
     return [
        'vote' => $faker->boolean(75) ? 'Yes' : 'No',
        'question_id' => $faker->numberBetween(1, Question::all()->count()),
        'user_id' => $faker->numberBetween(1, User::all()->count())
     ];
});

$factory->define(App\Answer::class, function(Faker\Generator $faker){
    return [
        'content' => $faker->paragraphs(1, true),
        'totalVotes' => 0,
        'question_id' => $faker->numberBetween(1, Question::all()->count()),
        'user_id' => $faker->numberBetween(1, User::all()->count())
    ];
});

$factory->define(App\AnswerEvaluation::class, function(Faker\Generator $faker){
    return [
        'vote' => $faker->boolean(75) ? 'Yes' : 'No',
        'answer_id' => $faker->numberBetween(1, Answer::all()->count()),
        'user_id' => $faker->numberBetween(1, User::all()->count())
    ];
});



