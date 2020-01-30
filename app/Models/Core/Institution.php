<?php

namespace App\Models\Core;

use App\User;
use DB;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{

	protected $fillable = ["name","slug","brand_name","address","address_postal_code","institution_level_id","organization_type_id","is_branch","parent_institution_id","user_id","discount","intro","featured_image","status"];

	public function institutionLevel(){
	    return $this->belongsTo(InstitutionLevel::class);
    }
    public function organizationType(){
        return $this->belongsTo(OrganizationType::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function institutionServices(){
        return $this->hasMany(InstitutionService::class);
    }

    public function visits(){
        return $this->hasMany(Visit::class);
    }

    public function getRatingCount(){
	    $rating =  Rating::join('visits','ratings.visit_id','=','visits.id')
            ->where('visits.institution_id',$this->id)
            ->select(DB::raw('SUM(ratings.rating) as rating'))
            ->first();
	    if ($rating->rating){
	        $users = Rating::join('visits','ratings.visit_id','=','visits.id')
                ->where('visits.institution_id',$this->id)->count();
	        return round($rating->rating / $users);
        }
	    return 3;

    }

    public static function getInstitutionRatingCount($id){
        $rating =  Rating::join('visits','ratings.visit_id','=','visits.id')
            ->where('visits.institution_id',$id)
            ->select(DB::raw('SUM(ratings.rating) as rating'))
            ->first();
        if ($rating->rating){
            $users = Rating::join('visits','ratings.visit_id','=','visits.id')
                ->where('visits.institution_id',$id)->count();
            return round($rating->rating / $users);
        }
        return 3;
    }
}
