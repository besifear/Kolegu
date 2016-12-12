<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedCategory extends Model
{

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

	protected $fillable = [
        'category_id', 'user_id'
    ];
	
    

    public $timestamps=false;

    protected $table = 'selectedcategories';
}
