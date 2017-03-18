<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Answer extends Model
{

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function getMyUpVote(){
        return $this->hasOne('App\AnswerEvaluation','answer_id')->where([
            ['user_id','=',Auth::user()->id] ,
            ['vote','=','Yes'],
        ]);
    }

    public function upVotes(){
        return $this->hasMany('App\AnswerEvaluation','answer_id')->where('Vote','=','Yes');
	}

    public function getMyDownVote(){
        return $this->hasOne('App\AnswerEvaluation','answer_id')->where([
            ['user_id','=',Auth::user()->id] ,
            ['vote','=','No'],
        ]);
    }

	public function downVotes(){
        return $this->hasMany('App\AnswerEvaluation','answer_id')->where('Vote','=','No');
    }

    public function allEvaluations(){
    	return $this->hasMany('App\AnswerEvaluation','answer_id');
    }
}
