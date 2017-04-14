<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

    use SoftDeletes;

    public function user(){
        return $this->belongsTo ('App\User');
    }

 public  function category (){

     return $this->belongsTo ('App\Category');

 }

 public function votes($type){

     return $this->hasMany('App\ResourceEvaluation')->where('vote','=',$type);

 }

public function allAnswers(){
        return $this->hasMany('App\ResourceReply','resource_id');
    }
    
}
