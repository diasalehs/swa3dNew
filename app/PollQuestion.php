<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollQuestion extends Model
{
    public function PollQuestionAnswer(){
        return $this->hasMany('App\PollQuestionAnswer');
    }
}
