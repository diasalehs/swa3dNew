<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//res one to many -- done
class Article extends Model
{
    public function researcher(){
    	return $this->belongsTo('researcher');
    }
}
