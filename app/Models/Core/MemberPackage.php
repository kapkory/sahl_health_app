<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class MemberPackage extends Model
{
    
	protected $fillable = ["member_id","package_id","started_on","ends_at","status","amount"];

}
