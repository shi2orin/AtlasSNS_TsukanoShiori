<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'username', 'mail', 'password','bio','images'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // リレーション
    public function follows()
        {
            return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
        }
    public function follower()
        {
            return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
        }


}
