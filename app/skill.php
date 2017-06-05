<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//ind & res many to many
class skill extends Model
{
    public function Researcher(){
        return $this->belongsToMany('Researcher','ResearcherSkill');
    }
    public function Individuals(){
        return $this->belongsToMany('Individuals','IndividualSkill');
    }
}
