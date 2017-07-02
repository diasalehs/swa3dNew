<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    public function InstDirector(){
    	return $this->hasMany('InstDirector');
    }
    public function achievementAndAward(){
    	return $this->belongsTo('achievementAndAward');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Event(){
        return $this->hasMany('App\Event','user_id');
    }
    public function Post(){
        return $this->hasMany('App\Post');
    }
}
