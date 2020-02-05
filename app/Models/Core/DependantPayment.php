<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class DependantPayment extends Model
{
    
	protected $fillable = ["dependant_ids","amount","member_id","status","reference","mode","comments","payer_id"];

}
