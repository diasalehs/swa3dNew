<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollQuestionAnswer extends Model
{
    public function PollQuestion(){
        return $this->hasOne('App\PollQuestion');
    }
}
