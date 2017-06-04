<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Question extends Model
{

    public $timeSinceCreated;

    use SoftDeletes;

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


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

//    public function getCreatedAtAttribute(){
//        $carbonated_date = Carbon::parse($this->attributes['created_at']);
//        //  Assuming today was 2016-07-27 12:45:32
//        $diff_date = $carbonated_date->diffForHumans(Carbon::now());
//        return $diff_date;
//    }
}