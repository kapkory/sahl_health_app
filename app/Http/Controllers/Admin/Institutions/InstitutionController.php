<?php

namespace App\Http\Controllers\Admin\Institutions;

use App\Http\Controllers\Controller;
use App\Models\Core\Institution;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index($id){
        $institution = Institution::findOrFail($id);
        return view($this->folder.'institution.index',compact('institution'));
    }
    public function setStatus($institution_id,$status){
        $institution = Institution::findOrFail($institution_id);
        $institution->status = StatusRepository::getInstitutionStatus($status);
        $institution->save();
        return back()->with('notice',['type'=>'success','message'=>'Institution has been successfully updated']);
    }
}
