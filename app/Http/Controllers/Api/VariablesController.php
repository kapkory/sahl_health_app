<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Core\Dependant;
use App\Models\Core\DependantPayment;
use App\Repositories\TechpitMessageRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VariablesController extends Controller
{
    public function listVariables(){
        return [
            'dependants'=>Dependant::select('id','user_id','first_name','last_name','other_name','identification_number','relationship_type')->get()
        ];
    }

    public function packages($package_id){
        header("Content-Type: application/json");
        $payment_id = \request('payment_id');
        $resp =  json_decode(file_get_contents('php://input'));

      $dpPackage = DependantPayment::findOrFail($package_id);
        if ($resp->Body->stkCallback->ResultCode == 0){
            $dpPackage->status = 2;
            $dpPackage->started_on = Carbon::now();
            $dpPackage->ends_on = Carbon::now()->addMonths(12);
            $dpPackage->save();

            //update where records match
             Dependant::whereIn('id',$dpPackage->dependant_ids)->update(['status'=>2]);

            $user = auth()->user();
            $message= 'Dear '.$user->name.', your payment of KES '.$dpPackage->amount.' for has been received, Thank you';
            $phone = preg_replace('/^\\D*/', '', $user->phone_number);

            $phone_number [] = $phone;
            $techpitch = new TechpitMessageRepository();
            $response = $techpitch->execute($message,$phone_number);
        }


    }
}
