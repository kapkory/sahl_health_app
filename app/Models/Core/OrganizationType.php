<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class OrganizationType extends Model
{

	protected $fillable = ["name","slug","user_id"];

    public function institutions(){
        return $this->hasMany(Institution::class);
    }

}
