<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

	protected $fillable = ["visit_id","user_id","comments","rating","status"];

	public function visit(){
	    return $this->belongsTo(Visit::class);
    }
}
