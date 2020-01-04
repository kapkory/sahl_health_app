<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class MemberPayment extends Model
{
    
	protected $fillable = ["member_id","package_id","amount","reference","payment_mode","status","comment","payer_id"];

}
