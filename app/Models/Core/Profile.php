<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
	protected $fillable = ["user_id","date_of_birth","bio","timezone","identification_type_id","identification_number","website"];

}
