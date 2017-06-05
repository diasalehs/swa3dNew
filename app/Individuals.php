<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individuals extends Model
{
    public function Intrest(){
        return $this->belongsToMany('Intrest','IndividualIntrest');
    }
    public function skill(){
        return $this->belongsToMany('skill','IndividualSkill');
    }
    public function NGOWorkFeild(){
    	return $this->belongsTo('NGOWorkFeild');
    }
    public function Qualification(){
    	return $this->belongsTo('Qualification');
    }

     * @var array
     */
    protected $fillable = [
            'name', 'email',
            'cityName',
            'livingPlace',
            'country',
            'gender',
            'currentWork',
            'educationalLevel',
            'preVoluntary',
            'voluntaryYears',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
            'name', 'email',
            'cityName',
            'livingPlace',
            'country',
            'gender',
            'currentWork',
            'educationalLevel',
            'preVoluntary',
            'voluntaryYears',
    ];
}
