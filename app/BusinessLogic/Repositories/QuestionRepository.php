<?php

namespace App\BusinessLogic\Repositories;

use App\Question;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\BusinessLogic\Interfaces\QuestionInterface;

class QuestionRepository implements QuestionInterface{


    public function all($columns = ['*']){
        return Question::all($columns);
    }

    public function find($id, $columns = ['*']){
        return Question::find($id, $columns);
    }

    public function orderBy($column, $direction = 'asc'){
        return Question::orderBy($column, $direction);
    }

    public function create($body){
        return Question::create($body);
    }

    public function delete($id){
        Question::find($id)->delete();
    }

    public function ownsQuestion($id){
        return (Question::where([
            ['id', $id],
            ['user_id', Auth::id()]
        ])->exists());
    }
}