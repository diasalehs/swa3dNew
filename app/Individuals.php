<?php

namespace App;
use Illuminate\Database\Query\Builder;

use Illuminate\Database\Eloquent\Model;

class Individuals extends Model
{
    public function Intrest(){
        return $this->belongsToMany('Intrest','IndividualIntrest');
    }
    public function skill(){
        return $this->belongsToMany('skill','IndividualSkill');
    }
    public function NGOWorkFeild(){
    	return $this->belongsTo('NGOWorkFeild');
    }
    public function Qualification(){
        return $this->hasMany('Qualification');
    }    
    public function User(){
        return $this->belongsTo('App\User');
    }
    

}
