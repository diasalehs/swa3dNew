<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function User()
	{
		return $this->hasOne('App\User');
	}

	public function Event()
	{
		return $this->hasOne('App\Event');
	}
}
