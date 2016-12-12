<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionEvaluation extends Model
{

    protected $fillable=['question_id','user_id','vote'];

    public $timestamps = false;
    protected $table = 'questionevaluations';
}
