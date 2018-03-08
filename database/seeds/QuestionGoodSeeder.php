<?php

use Illuminate\Database\Seeder;

class QuestionGoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Question::class, 1)->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'title' => 'Temperatura ne Prishtine dhe Prizren',
                    'content' =>'Pse Prizreni eshte me i nxehte se Prishtina?'
                ])->each(function( $question ){
                   factory(App\QuestionCategories::class, 1)->create([
                        'question_id' => $question->id,
                        'category_id' => rand(1, count(App\Category::all())) 
                   ]); 
                });
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'title' => 'Termetet ne Kosove',
                    'content' =>'Pse nuk jane te theksuara termetet ne Kosove?'
                ])->each(function( $question ){
                   factory(App\QuestionCategories::class, 1)->create([
                        'question_id' => $question->id,
                        'category_id' => rand(1, count(App\Category::all())) 
                   ]); 
                });
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'title' => 'Gjirafa',
                    'content' =>'Pse e ka gjirafa qafen e gjate?'
                ])->each(function( $question ){
                   factory(App\QuestionCategories::class, 1)->create([
                        'question_id' => $question->id,
                        'category_id' => rand(1, count(App\Category::all())) 
                   ]); 
                });
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'title' => 'Viber vs Whats App',
                    'content' =>'Kush eshte me i sigurt : Viber apo Whats App?'
                ])->each(function( $question ){
                   factory(App\QuestionCategories::class, 1 )->create([
                        'question_id' => $question->id,
                        'category_id' => rand(1, count(App\Category::all())) 
                   ]); 
                });
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'title' => 'Logaritmi negativ',
                    'content' =>'Pse nuk ka logaritem negativ?'
                ])->each(function( $question ){
                   factory(App\QuestionCategories::class, 1 )->create([
                        'question_id' => $question->id,
                        'category_id' => rand(1, count(App\Category::all())) 
                   ]); 
                });
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'title' => 'Humbje peshe',
                    'content' =>'Qysh me humb pesh?'
                ])->each(function( $question ){
                   factory(App\QuestionCategories::class, 1 )->create([
                        'question_id' => $question->id,
                        'category_id' => rand(1, count(App\Category::all())) 
                   ]); 
                });
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'title' => '1 minut',
                    'content' =>'Pse 1 minut ka 60 sekonda?'
                ])->each(function( $question ){
                   factory(App\QuestionCategories::class, 1 )->create([
                        'question_id' => $question->id,
                        'category_id' => rand(1, count(App\Category::all())) 
                   ]); 
                });
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'title' => 'Temperatura me e ulet',
                    'content' =>'Cila eshte temperatura me e ulet e mundshme?'
                ])->each(function( $question ){
                   factory(App\QuestionCategories::class, 1 )->create([
                        'question_id' => $question->id,
                        'category_id' => rand(1, count(App\Category::all())) 
                   ]); 
                });
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'title' => 'Gripi',
                    'content' =>'Perse ftohemi apo me mire te themi perse na ze gripi?'
                ])->each(function( $question ){
                   factory(App\QuestionCategories::class, 1 )->create([
                        'question_id' => $question->id,
                        'category_id' => rand(1, count(App\Category::all())) 
                   ]); 
                });
    }
}
