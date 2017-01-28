<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    //

    public $fillable=['description','reputationaward','difficulty'];
    public $timestamps = false;
}
