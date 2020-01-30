<?php

namespace App\Http\Controllers\Member\Institutions;

use App\Http\Controllers\Controller;
use App\Models\Core\Institution;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $institutions = Institution::where('organization_type_id',1)->paginate(12);
//        dd($institutions);
        return  view($this->folder.'index',compact('institutions'));
    }
}
