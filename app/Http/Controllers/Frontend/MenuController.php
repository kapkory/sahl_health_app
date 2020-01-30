<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Core\County;
use App\Models\Core\Institution;
use App\Models\Core\InstitutionLevel;
use App\Models\Core\InstitutionService;
use App\Models\Core\Package;
use App\Models\Core\Service;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $featured_hospitals = Institution::where('organization_type_id',1)->where('featured_image','!=',null)->limit(6)->get();
        $packages = Package::where('status',1)->get();

        return view($this->folder.'home',compact('featured_hospitals','packages'));
    }

    public function hospitals(){
        $levels = InstitutionLevel::all();
        $services = InstitutionService::join('services','services.id','=','institution_services.service_id')
                   ->join('institutions','institutions.id','=','institution_services.institution_id')
                    ->where('institutions.status',StatusRepository::getInstitutionStatus('active'))
                    ->groupBy('services.id')
                     ->select('services.id','services.name')
                    ->get();

        $hospitals = Institution::where('organization_type_id',1)->paginate(12);
        $counties = County::select('id','name')->get();
        return view($this->folder.'hospitals',compact('hospitals','levels','services','counties'));
    }

    public function hospital($slug){
        $institution = Institution::where('slug',$slug)->first();
        if (!$institution)
            return redirect('hospitals');

//        dd($institution->institutionServices);

        return view($this->folder.'view_hospital',compact('institution'));
    }
}
