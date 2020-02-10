<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    
	protected $fillable = ["name","job_title","company_name","employees","phone_number","email","status","cost"];

}
