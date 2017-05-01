<?php

use Illuminate\Database\Seeder;

class EverythingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 2)->create(['role' => 'Admin'])->each(function ($user){
            factory(App\Category::class, 3)->create()->each(function ($category) use ($user){
                factory(App\Question::class, 5)->create([
                    'user_id' =>$user->id,
                    'category_id' =>$category->id
                ])->each(function ($question) use ($user, $category){
                    factory(App\QuestionEvaluation::class, 1)->create([
                        'user_id' =>$user->id,
                        'question_id' =>$question->id
                    ]);

                    factory(App\Answer::class, 3)->create([
                        'user_id' =>$user->id,
                        'question_id' =>$question->id
                    ])->each(function($answer) use ($user, $question){

                        factory(App\AnswerEvaluation::class, 1)->create([
                            'user_id' =>$user->id,
                            'answer_id' =>$answer->id
                        ]);
                    });
                });
            });
        });


        // factory(App\User::class, 10)->create(['role' => 'Admin'])->each(function ($user){
        //     factory(App\Category::class, 5)->create()->each(function ($category) use ($user){
        //         factory(App\Question::class, 25)->create([
        //             'user_id' =>$user->id,
        //             'category_id' =>$category->id
        //         ])->each(function ($question) use ($user, $category){
        //             factory(App\QuestionEvaluation::class, 1)->create([
        //                 'user_id' =>$user->id,
        //                 'question_id' =>$question->id
        //             ]);

        //             factory(App\Answer::class, 14)->create([
        //                 'user_id' =>$user->id,
        //                 'question_id' =>$question->id
        //             ])->each(function($answer) use ($user, $question){

        //                 factory(App\AnswerEvaluation::class, 1)->create([
        //                     'user_id' =>$user->id,
        //                     'answer_id' =>$answer->id
        //                 ]);
        //             });
        //         });
        //     });
        // });
    }
}
