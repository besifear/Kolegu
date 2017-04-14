<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'votes'
    ];

    public function upVotes(){
        return $this->hasMany('App\QuestionEvaluation','question_id')->where('Vote','=','Yes');
	}

    public function getMyUpVote(){
        return $this->hasOne('App\QuestionEvaluation','question_id')->where([
            ['user_id','=',Auth::user()->id] ,
            ['vote','=','Yes'],
        ]);
    }

    public function downVotes(){
        return $this->hasMany('App\QuestionEvaluation','question_id')->where('Vote','=','No');
    }

    public function getMyDownVote(){
        return $this->hasOne('App\QuestionEvaluation','question_id')->where([
            ['user_id','=',Auth::user()->id] ,
            ['vote','=','No'],
        ]);
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