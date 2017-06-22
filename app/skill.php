<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//ind & res many to many
class skill extends Model
{
        public function Individuals(){
        return $this->belongsToMany('Individuals','IndividualSkill');
    }
}
