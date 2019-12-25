<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class InstitutionContact extends Model
{
    
	protected $fillable = ["name","email","phone_number","institution_id","user_id","role"];

}
