<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    public function Individuals()
	{
		return $this->hasOne('App\Individuals');
	}

	public function Event()
	{
		return $this->hasOne('App\Event');
	}
}
