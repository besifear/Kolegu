<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerEvaluation extends Model
{
	protected $fillable = [
		'vote',
		'user_id',
		'answer_id'
	];

	public $timestamps = false;
	
    protected $table = 'answerevaluations';
}
