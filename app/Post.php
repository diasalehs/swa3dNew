<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Institute(){
        return $this->belongsTo('App\Institute');
    }

    public function Event(){
        return $this->belongsTo('App\Event');
    }
}
