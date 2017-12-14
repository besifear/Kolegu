<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	protected $table = 'sociallogins';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
