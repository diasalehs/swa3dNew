<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//ind & res many to many
class Intrest extends Model
{
  
    public function Individuals(){
        return $this->belongsToMany('Individuals','IndividualIntrest');
    }
}
