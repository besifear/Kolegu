<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeltes;
use Illuminate\Database\Eloquent\Model;

class ResourceReply extends Model
{

    use SoftDeltes;

    public function user(){
        return $this->belongsTo ('App\User');
    }


    public function upVotes(){
        return $this->hasMany('App\ResourceReplyEvaluation','resourcereply_id','id')->where('vote','=','Yes');
    }

    public function downVotes(){
        return $this->hasMany('App\ResourceReplyEvaluation','resourcereply_id','id')->where('vote','=','No');
    }

    public function votes(){
        return $this->hasMany('App\ResourceReplyEvaluation','resourcereply_id','id');
    }

    //

    protected $fillable=['content','resource_id','user_id'];
    protected $table='resourcereplies';
}
