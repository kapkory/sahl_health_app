<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class InstitutionLevel extends Model
{

	protected $fillable = ["name","slug","facilities","created_by"];

	public function institutions(){
	    return $this->hasMany(Institution::class);
    }
}
