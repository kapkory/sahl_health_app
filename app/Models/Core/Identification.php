<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{

	protected $fillable = ["name","is_provider","user_id"];

}
