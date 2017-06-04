<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Question extends Model
{

    use SoftDeletes;

    protected $appends = [
        'diff_for_humans',
    ];


    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'votes',
        'answer_id'
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

    public function allAnswersWithUser(){
        
        return $this->hasMany('App\Answer','question_id')->with('user');
        
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getDiffForHumansAttribute(){
       $carbonated_date = Carbon::parse($this->attributes['created_at']);
       $diff_date = $carbonated_date->diffForHumans(Carbon::now());
       return $diff_date;
    }
}