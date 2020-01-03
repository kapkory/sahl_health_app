<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Core\Identification;
use App\Models\Core\InstitutionLevel;
use App\Models\Core\OrganizationType;
use App\Models\Core\PackageCategory;
use App\Repositories\TechpitMessageRepository;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function variables($variable){
        $response = '';
        switch ($variable){
            case 'levels':
                $response = InstitutionLevel::select('id','name')->get();
                break;
            case 'organization_types':
                $response = OrganizationType::select('id','name')->get();
                break;
            case 'identifications':
                $response = Identification::select('id','name')->where('is_provider',0)->get();
                break;
            case 'package_categories':
                $response = PackageCategory::select('id','name')->get();
                break;
        }
        return $response;
    }

    public function sendSms(){

         $timestamp = Carbon::now('Africa/Nairobi')->format('YmdHis');
//         dd($timestamp,date('YmdHis'));

        $message= 'Hello there, This is a test Message';
        $address= ['254712137367'];
        $message = new TechpitMessageRepository();
        $response = $message->execute($message,$address);
        return $response;

    }
}
