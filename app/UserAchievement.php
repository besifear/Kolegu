<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAchievement extends Model
{
    //

    protected $fillable = ['achievement_id', 'user_id'];

    protected $table="userachievement";

}
