<?php

namespace App;


use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    public function owns($relation){
       return $relation->user_id == Auth::id();
    }

    public function messages(){
       return $this->hasMany('App\Message','reciever_id');
    }

    public function unseenMessages(){
        return $this->hasMany('App\Message','reciever_id')->where('status','=','no');
    }

    public function selectedCategories(){
        return $this->hasMany('App\SelectedCategory');
    }


    public function numberOf($model){
        $model = 'App\\'.$model;
        return $model::where('user_id', Auth::id())
            ->get()->count();
    }




    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function userAchievements(){
        return $this->hasMany('App\UserAchievement');
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'reputation',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->token = str_random(40);
        });
    }

    public function hasVerified()
    {
        $this->verified = true;
        $this->token = null;

        $this->save();
    }

}
