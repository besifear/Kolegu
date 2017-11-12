<?php

namespace App;

use Auth;
use Carbon\Carbon;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{

    use SoftDeletes, Searchable;

    protected $appends = [
        'diff_for_humans',
        'my_up_vote',
        'my_down_vote',
        'question_up_votes',
        'question_down_votes',
        'question_all_answers',
        'question_category',
        'question_owner'
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

    public function getMyUpVoteAttribute(){
        if (Auth::check()){
            return $this->getMyUpVote()->get()->count();
        }
        return 0;
    }

    public function getMyDownVoteAttribute(){
        if (Auth::check()){
            return $this->getMyDownVote()->get()->count();
        }
        return 0;
    }

    public function getQuestionUpVotesAttribute(){
        return $this->upVotes()->get()->count();
    }

    public function getQuestionDownVotesAttribute(){
        return $this->downVotes()->get()->count();
    }

    public function getQuestionAllAnswersAttribute(){
        return $this->allAnswers()->get()->count();
    }

    public function getQuestionCategoryAttribute(){
        return $this->category()->first();
    }

    public function getQuestionOwnerAttribute(){
        return $this->user()->first(['id','username']);
    }
}