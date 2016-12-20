<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{

    public function sender(){
        return $this->hasOne('App\User','id','user_id');
    }

    protected $fillable=[
      'title','content','user_id'
    ];
}
