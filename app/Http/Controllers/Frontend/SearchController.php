<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Core\Institution;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchHospitals(){
//        $institutions = Institution::join()
        dd(\request()->all());
    }
}
