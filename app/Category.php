<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    public $primaryKey='Name';
    public $incrementing=false;

    public $timestamps = false;
    protected $table = "category";
    

    
}
