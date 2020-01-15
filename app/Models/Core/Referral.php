<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    
	protected $fillable = ["user_id","referral_id","amount","status"];

}
