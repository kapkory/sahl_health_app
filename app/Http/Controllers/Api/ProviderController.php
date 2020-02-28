<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Core\InstitutionService;
use App\Models\Core\Service;
use App\Repositories\TechpitMessageRepository;
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

    public function sendSms(){
//        $message = 'Phone Number was sent at '.$user->getFormattedPhone();
       $message = 'Test Message by Me';
//        $message = 'Phone Number was sent at '.$user->getFormattedPhone();
        $techpitch = new TechpitMessageRepository();
        $address = ['254712137367','0712137367','+254712137367'];
        $response = $techpitch->execute($message,$address);
        return ['status'=>true];
    }
}
