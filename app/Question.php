<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\QuestionEvaluation;

class Question extends Model
{

    public function upVotes(){
        return $this->hasMany('App\QuestionEvaluation','question_id')->where('Vote','=','Yes');
	}

	public function downVotes(){
        return $this->hasMany('App\QuestionEvaluation','question_id')->where('Vote','=','No');
    }

    public function allEvaluations(){
    	return $this->hasMany('App\QuestionEvaluation','question_id');
    }

    public function allAnswers(){
        return $this->hasMany('App\Answer','question_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

	
}