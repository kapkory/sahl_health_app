<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Core\Identification;
use App\Models\Core\InstitutionLevel;
use App\Models\Core\OrganizationType;
use App\Models\Core\PackageCategory;
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
        header("Content-Type: application/json");
         $username = 'SAHL';
         $password = '!Kitale2019';
         $businessCode = 'TPL-SAH-013';
         $timestamp = date('YmdHis');
         $data =  [
             'token' => base64_encode(hash('sha256', $username . $password . $timestamp)),
             'timestamp' => $timestamp,
             'business_code' => $businessCode,
             'short_code' => 'SAHL-HEALTH',
             'external_bulk_id' => Str::random(14),
             'message' => "test Message by Levis",
             'schedule_time' => date("Y-m-d H:i:s"),
             'addresses' => ['254712137367']
         ];

        $client = new Client();

        $response = $client->post('http://196.13.121.195:9095/external-bulk/create', [
            'json' =>$data,
        ]);
        return json_decode((string) $response->getBody(), true);
    }
}
