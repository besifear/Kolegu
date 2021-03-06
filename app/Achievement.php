<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    public $fillable=['description','reputationaward','difficulty'];
    public $timestamps = false;

    public static function findByIdentifier( $identifier ){
    	return static::where( 'identifier', $identifier )->first();
    }

    public static function findByName($name){
        return static::where('name', $name)->first();
    }
}
