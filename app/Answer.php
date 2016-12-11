<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $primaryKey='AnswerID';
    
    protected $table = "answer";
}
