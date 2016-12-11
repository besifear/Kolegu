<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionEvaluation extends Model
{
    protected $table='QuestionEvaluation';

    public $primaryKey='QuestionEvaluationID';
    public $timestamps = false;
}
