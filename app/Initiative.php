<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
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
        return $this->belongsTo('Qualification');
    }    
    public function User(){
        return $this->belongsTo('App\User');
    }
}
