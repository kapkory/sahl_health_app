<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Core\County;
use App\Models\Core\Institution;
use App\Models\Core\InstitutionLevel;
use App\Models\Core\InstitutionService;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchHospitals(){
        $institutions = Institution::leftJoin('institution_services','institution_services.institution_id','=','institutions.id')
                        ->where('institutions.status',1)
                        ->where('organization_type_id',1);

        if (\request('county') != ''){
            $institutions = $institutions->where('institutions.county_id',\request('county'));
        }

        if (\request('level') != '')
            $institutions = $institutions->where('institutions.institution_level_id',\request('level'));

        if (\request('service') != ''){
            $institutions = $institutions->where('institution_services.service_id',\request('service'))
            ->select('institutions.*');
        }

        $levels = InstitutionLevel::all();
        $services = InstitutionService::join('services','services.id','=','institution_services.service_id')
            ->join('institutions','institutions.id','=','institution_services.institution_id')
            ->where('institutions.status',StatusRepository::getInstitutionStatus('active'))
            ->groupBy('services.id')
            ->select('services.id','services.name')
            ->get();
        dd($institutions);
        $counties = County::select('id','name')->get();
        $hospitals = $institutions->select('institutions.*')->groupBy('institutions.id')->paginate(12);
        return view($this->folder.'hospitals',compact('hospitals','levels','services','counties'));

    }
}
