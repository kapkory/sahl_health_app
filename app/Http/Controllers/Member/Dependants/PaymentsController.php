<?php

namespace App\Http\Controllers\Member\Dependants;

use App\Http\Controllers\Controller;
use App\Models\Core\Dependant;
use App\Models\Core\DependantPayment;
use App\Repositories\MpesaRepository;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function payment(){
        $dependant_ids = json_decode(\request('dependant_ids'));
        $amount = \request('amount');

        $dependants = Dependant::whereIn('id',$dependant_ids)->update(['status'=>1]);

        $dpPayment = DependantPayment::whereIn('dependant_ids',$dependant_ids)->first();

        if (!$dpPayment){
//            dd($dpPayment)
            $dp = new DependantPayment();
            $dp->dependant_ids =json_encode($dependant_ids);
            $dp->member_id = auth()->id();
            $dp->payer_id = auth()->id();
            $dp->amount = $amount;
            $dp->comments = 'Payment By '.auth()->user()->name;
            $dp->save();
            $pay_id = $dp->id;
        }
        else
            $pay_id = $dpPayment->id;

        $mpesaRepository= new MpesaRepository();
        $phone = auth()->user()->getFormattedPhone();
//        $amount = '1';
        $response =  $mpesaRepository->stkPush($pay_id,$phone,$amount,url('dependant/packages/'.$pay_id));
        $responses = json_decode($response,true);

        if (isset($responses['ResponseCode']) && $responses['ResponseCode']== 0){
            $checkoutRequestId = $responses['CheckoutRequestID'];
            $dp->reference = $checkoutRequestId;
            $dp->save();

            return ['redirect_url'=>url('member/payments')];
        }
        else
            return ['redirect_url'=>url('member/dependants')];

    }
}
