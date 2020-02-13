<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

	protected $fillable = ["description","user_id","status"];

	public function contacts(){
	    return $this->belongsToMany(Contact::class);
    }

}
