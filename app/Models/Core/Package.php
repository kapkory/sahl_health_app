<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

	protected $fillable = ["name","slug","package_category_id","number_of_members","cost","description","status","user_id","duration"];

	public function category(){
	    return $this->belongsTo(PackageCategory::class,'package_category_id');
    }
}
