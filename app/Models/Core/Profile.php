<?php

namespace App\Models\Core;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

	protected $fillable = ["user_id","date_of_birth","bio","timezone","identification_type_id","identification_number","website"];

	public function identificationType(){
	    return $this->belongsTo(Identification::class,'identification_type_id');
    }
    public function user(){
	    return $this->belongsTo(User::class);
    }

}
