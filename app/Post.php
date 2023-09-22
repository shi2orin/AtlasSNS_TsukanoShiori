<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = ['id','user_id', 'post'];

     public function user()
     {
     return $this->belongsTo('App\User');
     }
}
