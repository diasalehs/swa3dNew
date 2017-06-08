<?php

namespace App;
use Illuminate\Database\Query\Builder;

use Illuminate\Foundation\Auth\User as Authenticatable;
//ind res inst one to one
class User extends Authenticatable
{
     public function Institute(){
        return $this->hasone('App\Institute','user_id');
     }
     public function Researcher(){
         return $this->hasone('App\Researcher','user_id');
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
    public function Individuals()
    {
        return $this->hasOne('App\Individuals','user_id');
    }
}
