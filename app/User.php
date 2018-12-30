<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','firstname','surname','avatar','type','specialization','phone_number','password','pref_lang'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function seeds()
    {
        return $this->hasMany('App\Seed');
    }

    public function feeds()
    {
        return $this->hasMany('App\Feed');
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
