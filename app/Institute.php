<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    public function InstDirector(){
    	return $this->hasMany('App\InstDirector');
    }
    public function achievementAndAward(){
    	return $this->belongsTo('app\achievementAndAward');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Post(){
        return $this->hasMany('App\Post');
    }
        public function news(){
        return $this->hasMany('App\news');
    }

}
