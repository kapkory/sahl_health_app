<?php

namespace App\Http\Controllers\Admin\Institutions;

use App\Http\Controllers\Controller;
use App\Models\Core\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index($id){
        $institution = Institution::findOrFail($id);
        return view($this->folder.'institution.index',compact('institution'));
    }
}
