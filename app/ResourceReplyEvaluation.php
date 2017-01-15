<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceReplyEvaluation extends Model
{
    public $timestamps=false;
    protected $fillable=array('vote','resourcereply_id','user_id');
    protected $table='resourcereplyevaluations';
}
