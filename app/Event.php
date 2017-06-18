<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function Institute(){
        return $this->belongsTo('App\Institute');
    }
     public function Intrest(){
        return $this->belongsToMany('Intrest','event_intrest');
    }
}
