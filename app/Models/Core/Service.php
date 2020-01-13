<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

	protected $fillable = ["name","slug","organization_type_id","status","user_id"];

	public function institutionServices(){
	    return $this->hasMany(InstitutionService::class);
    }
}
