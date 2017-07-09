<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class researches extends Model
{
	public function tags(){
        return $this->belongsToMany('\App\tags','researches_tags','research_id','tag_id');
    }

    //
}
