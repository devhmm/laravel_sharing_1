<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function commentPost()
    {
        // return $this->belongsTo('App\Post','post_id');

        return $this->belongsTo('App\Post')->withDefault(function ($post) {
            $post->name = 'No Name';
        });
    }
}
