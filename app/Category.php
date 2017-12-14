<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   	use Searchable;
   	 
    public $timestamps = false;

    protected $table = 'categories';
    

}
