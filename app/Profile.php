<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Question;

class Profile extends Model
{
    protected $table = 'users';

    public function allAnswers(){
        return $this->hasMany('App\Question','user_id');
    }
}
