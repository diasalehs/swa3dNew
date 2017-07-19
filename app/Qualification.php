<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//ind & res many to one
class Qualification extends Model
{
    public function Individuals(){
    	return $this->belongsTo('Individuals');
    }
  
}
