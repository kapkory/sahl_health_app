<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Core\County;
use App\Models\Core\Institution;
use App\Models\Core\InstitutionLevel;
use App\Models\Core\InstitutionService;
use App\Repositories\StatusRepository;
use Illuminate\Http\Request;

class GeneralController extends Controller
{

    public function discounts(){


        $hospitals = Institution::where('organization_type_id',1)->where('status',1)
            ->where('discount','>',0)->orderBy('discount','desc')
            ->paginate(12);

        return view($this->folder.'general.hospital_discounts',compact('hospitals'));
    }
}
