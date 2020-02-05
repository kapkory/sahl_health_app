<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{

	protected $fillable = ["name","code","capital"];

	public function institutions(){
	    return $this->hasMany(Institution::class);
    }

}
