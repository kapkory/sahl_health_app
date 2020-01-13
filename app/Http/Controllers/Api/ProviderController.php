<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Core\InstitutionService;
use App\Models\Core\Service;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function listServices($institution_id){
        $services = Service::leftJoin('institution_services',function ($join) use($institution_id){
               $join->on('services.id','=','institution_services.service_id')
               ->where('institution_services.institution_id',$institution_id);
        })->whereNull('service_id')->select('services.id','services.name')->get();

        return $services;
    }
}
