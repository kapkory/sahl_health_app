<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Core\Institution;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $featured_hospitals = Institution::where('organization_type_id',1)->where('featured_image','!=',null)->limit(3)->get();
        return view($this->folder.'home',compact('featured_hospitals'));
    }

    public function hospitals(){
        $hospitals = Institution::where('organization_type_id',1)->paginate(12);
        return view($this->folder.'hospitals',compact('hospitals'));
    }
}
