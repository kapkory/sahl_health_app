<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{

	protected $fillable = ["name","slug","brand_name","address","address_postal_code","institution_level_id","organization_type_id","is_branch","parent_institution_id","user_id","discount","intro","featured_image","status"];

	public function institutionLevel(){
	    return $this->belongsTo(InstitutionLevel::class);
    }
    public function organizationType(){
        return $this->belongsTo(OrganizationType::class);
    }
}
