<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    
	protected $fillable = ["name","slug","user_id","description"];

}
