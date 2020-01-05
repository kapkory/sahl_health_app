<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    
	protected $fillable = ["institution_id","user_id","dependant_id","status"];

}
