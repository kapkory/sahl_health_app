<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    
	protected $fillable = ["name","email","phone","location","message","status"];

}
