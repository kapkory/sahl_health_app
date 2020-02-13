<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class InstitutionImage extends Model
{
    
	protected $fillable = ["institution_id","user_id","path","size","status"];

}
