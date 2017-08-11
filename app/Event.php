<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
     public function Intrest(){
        return $this->belongsToMany('\App\Intrest','event_intrests','event_id','intrset_id');
    }
     public function targetedGroups(){
        return $this->belongsToMany('\App\targetedGroups','event_targets','event_id','target_id');
    }
    public function User(){
        return $this->belongsTo('\App\User');
    }
    public function Post(){
        return $this->hasMany('\App\Post');
    }
    public function Lesson(){
        return $this->hasOne('\App\Lesson');
    }
    public function Review(){
        return $this->hasMany('\App\Review');
    }
}
