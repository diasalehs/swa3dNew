<?php

namespace App;
use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//ind res inst one to one
class User extends Authenticatable
{       use Notifiable;
     public function Institute(){
        return $this->hasOne('App\Institute','user_id');
     }
     public function tempInstitute(){
        return $this->hasOne('App\Institute','user_id');
     }

    public function Individuals(){
        return $this->hasOne('App\Individuals','user_id');
    }

    public function Initiative(){
        return $this->hasOne('App\Initiative','user_id');
    }

     public function Intrest(){
        return $this->belongsToMany('App\Intrest','user_intrests');
    }
    public function targetedGroups(){
        return $this->belongsToMany('App\targetedGroups','user_targets');
    }

    public function Event(){
        return $this->hasMany('App\Event');
    }


    /**
     * A user can have many friends.
     *
     * @return Collection
     *
     */
    public function friends()
    {
        return $this->belongsToMany(Self::class, 'friends', 'requested_id', 'requester_id')->withTimestamps();
    }

    public function Member()
    {
        return $this->belongsToMany(Self::class, 'Members', 'individual_id', 'initiative_id')->withTimestamps();
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','userType','flag'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
