<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class Researcher extends Model
{
    public function article(){
    	return $this->hasMany('article');
    }
    public function Intrest(){
        return $this->belongsToMany('Intrest','ResearcherIntrest');
    }
    public function skill(){
        return $this->belongsToMany('skill','ResearcherSkill');
    }
    public function NGOWorkFeild(){
    	return $this->belongsTo('NGOWorkFeild');
    }
    public function Qualification(){
    	return $this->belongsTo('Qualification');
    }
       public function User(){
        return $this->belongsTo('App\User');
    }
}
