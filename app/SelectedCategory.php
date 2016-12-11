<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedCategory extends Model
{

    public function category(){
        return $this->belongsTo('App\Category','CategoryName');
    }

	protected $fillable = [
        'CategoryName', 'Username'
    ];
	
    

    public $timestamps=false;

    protected $table = 'selectedcategories';
}
