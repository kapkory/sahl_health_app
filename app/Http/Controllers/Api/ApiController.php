<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Core\County;
use App\Models\Core\Identification;
use App\Models\Core\InstitutionLevel;
use App\Models\Core\MemberPackage;
use App\Models\Core\MemberPayment;
use App\Models\Core\OrganizationType;
use App\Models\Core\Package;
use App\Models\Core\PackageCategory;
use App\Models\Core\Referral;
use App\Repositories\TechpitMessageRepository;
use App\User;
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
            case 'county':
                $response = County::select('id','name')->get();
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
            case 'packages':
                $resp = Package::select('id','name','package_category_id','cost')->where('status',1)->get();
                $response = ['packages'=>$resp];
                break;
        }
        return $response;
    }

    public function mpesaCallback(){
        header("Content-Type: application/json");
        $payment_id = \request('payment_id');
        $resp =  json_decode(file_get_contents('php://input'));

        //success
        if ($resp->Body->stkCallback->ResultCode == 0){
            $pay = MemberPayment::findOrFail($payment_id);
            $pay->reference = $resp->Body->stkCallback->CheckoutRequestID;
            $pay->comment = $resp->Body->stkCallback->ResultDesc;
            $pay->status = 2;
            $pay->save();

            $memberPackage = MemberPackage::where('member_id',$pay->member_id)
                       ->where('package_id',$pay->package_id)->orderBy('created_at','desc')
                       ->first();
            $package = Package::findOrFail($pay->package_id);

            $memberPackage->started_on = Carbon::now()->toDateString();
            $memberPackage->ends_at = Carbon::now()->addMonths($package->duration)->toDateString();
            $memberPackage->save();

            $user = User::findOrFail($pay->member_id);
            $user->member_package_id = $memberPackage->id;
            $user->save();

            $referral = Referral::where('referral_id',$user->id)->first();
            if ($referral){
                $referee = User::findOrFail($referral->user_id);
                $referee->wallet += $referral->amount;
                $referee->save();

                $referral->status = 1;
                $referral->save();
            }

            $message= 'Dear '.$user->name.', your payment of KES '.$memberPackage->amount.' for '.$package->category->name.' has been received, Thank you';
            $phone = preg_replace('/^\\D*/', '', $user->phone_number);

            $phone_number [] = $phone;
            $techpitch = new TechpitMessageRepository();
            $response = $techpitch->execute($message,$phone_number);


        }else{

            $pay = MemberPayment::findOrFail($payment_id);
            $pay->reference = $resp->Body->stkCallback->CheckoutRequestID;
            $pay->comment = $resp->Body->stkCallback->ResultDesc;
            $pay->status = 3;
            $pay->save();
        }
        echo '{"ResultCode": 0, "ResultDesc": "The service was accepted successfully", "ThirdPartyTransID": "1234567890"}';
    }

    public function sendSms(){
        $message= 'Hello there, This is a test Message';
        $address= ['254712137367'];
        $techpitch = new TechpitMessageRepository();
        $response = $techpitch->execute($message,$address);
        return $response;
//        header("Content-Type: application/json");
//         $username = 'SAHL';
//         $password = '!Kitale2019';
//         $businessCode = 'TPL-SAH-013';
//         $timestamp = Carbon::now('Africa/Nairobi')->format('YmdHis');
//         dd($timestamp,date('YmdHis'));
//         $data =  [
//             'token' => base64_encode(hash('sha256', $username . $password . $timestamp)),
//             'timestamp' => $timestamp,
//             'business_code' => $businessCode,
//             'short_code' => 'SAHL-HEALTH',
//             'external_bulk_id' => Str::random(14),
//             'message' => "test Message by Levis",
//             'schedule_time' => Carbon::now('Africa/Nairobi')->format("Y-m-d H:i:s"),
//             'addresses' => ['254712137367']
//         ];
//
//        $client = new Client();
//
//        $response = $client->post('http://196.13.121.195:9095/external-bulk/create', [
//            'json' =>$data,
//        ]);
//        return json_decode((string) $response->getBody(), true);
    }
}
