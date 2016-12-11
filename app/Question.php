<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\QuestionEvaluation;

class Question extends Model
{

    public function upVotes(){
        return $this->hasMany('App\QuestionEvaluation','QuestionID')->where('Vote','=','Yes');
	}

	public function downVotes(){
        return $this->hasMany('App\QuestionEvaluation','QuestionID')->where('Vote','=','No');
    }

    public function allEvaluations(){
    	return $this->hasMany('App\QuestionEvaluation','QuestionID');
    }

    public function allAnswers(){
        return $this->hasMany('App\Answer','QuestionID');
    }

	public $primaryKey='QuestionID';
    public $table = "question";
}