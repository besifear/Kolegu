<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionCategories extends Model
{
    use SoftDeletes, Searchable;

    protected $appends = [
    	'category'
    ];

	protected $fillable = [
		'question_id',
		'category_id'
	];	
	protected $table = 'questioncategories';

	protected function category(){
		return $this->hasOne('App\Category', 'id', 'category_id');
	}

	protected function getCategoryAttribute(){
		return $this->category()->first();
	}
}
