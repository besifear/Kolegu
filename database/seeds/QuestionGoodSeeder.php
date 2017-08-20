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
                    'category_id' => rand(1, count(App\Category::all())),
                    'title' => 'Temperatura ne Prishtine dhe Prizren',
                    'content' =>'Pse Prizreni eshte me i nxehte se Prishtina?'
                ]);
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'category_id' =>rand(1, count(App\Category::all())),
                    'title' => 'Termetet ne Kosove',
                    'content' =>'Pse nuk jane te theksuara termetet ne Kosove?'
                ]);
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'category_id' =>rand(1, count(App\Category::all())),
                    'title' => 'Gjirafa',
                    'content' =>'Pse e ka gjirafa qafen e gjate?'
                ]);
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'category_id' =>rand(1, count(App\Category::all())),
                    'title' => 'Viber vs Whats App',
                    'content' =>'Kush eshte me i sigurt : Viber apo Whats App?'
                ]);
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'category_id' =>rand(1, count(App\Category::all())),
                    'title' => 'Logaritmi negativ',
                    'content' =>'Pse nuk ka logaritem negativ?'
                ]);
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'category_id' =>rand(1, count(App\Category::all())),
                    'title' => 'Humbje peshe',
                    'content' =>'Qysh me humb pesh?'
                ]);
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'category_id' =>rand(1, count(App\Category::all())),
                    'title' => '1 minut',
                    'content' =>'Pse 1 minut ka 60 sekonda?'
                ]);
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'category_id' =>rand(1, count(App\Category::all())),
                    'title' => 'Temperatura me e ulet',
                    'content' =>'Cila eshte temperatura me e ulet e mundshme?'
                ]);
        factory(App\Question::class,1 )->create([
                    'user_id' => rand(1, count(App\User::all())),
                    'category_id' =>rand(1, count(App\Category::all())),
                    'title' => 'Gripi',
                    'content' =>'Perse ftohemi apo me mire te themi perse na ze gripi?'
                ]);

    }
}
