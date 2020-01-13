<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class InstitutionService extends Model
{

	protected $fillable = ["service_id","institution_id","cost","discount_rate","status"];

	public function service(){
	    return $this->belongsTo(Service::class,'service_id');
    }

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

}
