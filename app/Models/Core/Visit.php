<?php

namespace App\Models\Core;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{

	protected $fillable = ["institution_id","user_id","dependant_id","status"];

	public function user(){
	    return $this->belongsTo(User::class);
    }

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function ratings(){
	    return $this->hasMany(Rating::class);
    }

    public function hasRated(){
	    $visits = Rating::where('visit_id',$this->id)
            ->where('user_id',auth()->id())->get();
	    if ($visits->isEmpty())
	        return true;
	    return false;
    }
}
