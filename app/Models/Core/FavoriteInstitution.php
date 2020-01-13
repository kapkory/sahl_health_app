<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class FavoriteInstitution extends Model
{
    
	protected $fillable = ["institution_id","user_id","status"];

}
