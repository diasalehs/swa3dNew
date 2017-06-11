<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['requester_id'];
	/**
	 * A feed belongs to a User.
	 *
	 * @return User
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
