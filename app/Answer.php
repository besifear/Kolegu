<?php

namespace App;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class Answer extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'content',
        'question_id',
        'user_id'
    ];

    protected $appends = [
        'creator', 
        'diff_for_humans',
        'answer_up_votes',
        'answer_down_votes', 
        'my_up_vote',
        'my_down_vote'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
    public function getCreatorAttribute(){
        return $this->user()->first();
    }

    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function getDiffForHumansAttribute(){
       $carbonated_date = Carbon::parse($this->attributes['created_at']);
       $diff_date = $carbonated_date->diffForHumans(Carbon::now());
       return $diff_date;
    }

    public function getMyVote(){
        return $this->hasOne('App\AnswerEvaluation','answer_id')->where([
            ['user_id','=',Auth::user()->id]
        ]);
    }

    public function getMyUpVote(){
        return $this->hasOne('App\AnswerEvaluation','answer_id')->where([
            ['user_id','=',Auth::user()->id] ,
            ['vote','=','Yes'],
        ]);
    }

    public function getMyUpVoteAttribute(){
        if (Auth::check()){
            return $this->getMyUpVote()->get()->count();
        }
        return 0;
    }

    public function upVotes(){
        return $this->hasMany('App\AnswerEvaluation','answer_id')->where('Vote','=','Yes');
	}

    public function getAnswerUpVotesAttribute(){
        return $this->upVotes()->get()->count();
    }

    public function getMyDownVote(){
        return $this->hasOne('App\AnswerEvaluation','answer_id')->where([
            ['user_id','=',Auth::user()->id] ,
            ['vote','=','No'],
        ]);
    }

    public function getMyDownVoteAttribute(){
        if (Auth::check()){
            return $this->getMyDownVote()->get()->count();
        }
        return 0;
    }
	
    public function downVotes(){
        return $this->hasMany('App\AnswerEvaluation','answer_id')->where('Vote','=','No');
    }

    public function getAnswerDownVotesAttribute(){
        return $this->downVotes()->get()->count();
    }
     
    public function allEvaluations(){
    	return $this->hasMany('App\AnswerEvaluation','answer_id');
    }



}
