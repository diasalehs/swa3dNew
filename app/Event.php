<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

     public function Intrest(){
        return $this->belongsToMany('Intrest','event_intrests');
    }

     public function targetedGroups(){
        return $this->belongsToMany('targetedGroups','event_targets');
    }
}
