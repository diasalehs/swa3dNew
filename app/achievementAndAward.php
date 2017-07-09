<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//inst many to one
class achievementAndAward extends Model
{
    public function Institute(){
    	return $this->hasMany('Institute');
    }
}
