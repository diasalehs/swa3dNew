<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
//ind res inst one to one
class User extends Authenticatable
{
    // public function institute(){
    //     return $this->hasone('institute');
    // }
    // public function Researcher(){
    //     return $this->hasone('Researcher');
    // }
    // public function Individuals(){
    //     return $this->hasone('Individuals');
    // }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
