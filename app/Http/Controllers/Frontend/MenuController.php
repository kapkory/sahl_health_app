<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Core\Institution;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $featured_hospitals = Institution::where('organization_type_id',1)->where('featured_image','!=',null)->limit(6)->get();
        return view($this->folder.'home',compact('featured_hospitals'));
    }

    public function hospitals(){
        $hospitals = Institution::where('organization_type_id',1)->paginate(12);
        return view($this->folder.'hospitals',compact('hospitals'));
    }

    public function hospital($slug){
        $institution = Institution::where('slug',$slug)->first();
        if (!$institution)
            return redirect('hospitals');

//        dd($institution->institutionServices);

        return view($this->folder.'view_hospital',compact('institution'));
    }
}
