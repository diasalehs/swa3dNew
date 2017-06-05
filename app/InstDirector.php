<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//inst one to many -- done
class InstDirector extends Model
{
    public function institute(){
    	return $this->belongsTo('institute');
    }
}
