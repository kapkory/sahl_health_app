<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Dependant extends Model
{
    
	protected $fillable = ["user_id","first_name","last_name","other_name","identification_type_id","identification_number","relationship_type","email","phone"];

}
