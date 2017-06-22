<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//ind & res many to one
class NGOWorkFeild extends Model
{
    public function Individuals(){
    	return $this->hasMany('Individuals');
    }
  
}
