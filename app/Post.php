<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function postComments()
    {
        return $this->hasMany('App\Comment');
    }
}
