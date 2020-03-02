<?php

namespace App\Http\Controllers\Member\Dependants;

use App\Http\Controllers\Controller;
use App\Models\Core\Dependant;
use App\Models\Core\DependantPayment;
use App\Repositories\MpesaRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function payment(){
        $dependant_ids = json_decode(\request('dependant_ids'),true);
        $amount = \request('amount');

        $dependants = Dependant::whereIn('id',$dependant_ids)->update(['status'=>1]);

        $dpPayment = DependantPayment::where('member_id',auth()->id())
            ->where('dependant_ids',\request('dependant_ids'))
            ->first();

        if (!$dpPayment){
            $dp = new DependantPayment();
            $dp->dependant_ids =json_encode($dependant_ids);
            $dp->member_id = auth()->id();
            $dp->payer_id = auth()->id();
            $dp->amount = $amount;
            $dp->status = 1;//processing
            $dp->comments = 'Payment By '.auth()->user()->name;
            $dp->save();
            $pay_id = $dp->id;

        }
        else
            $pay_id = $dpPayment->id;
//         return $this->test_dependant_payments_target($pay_id);

        $mpesaRepository= new MpesaRepository();
        $phone = auth()->user()->getFormattedPhone();
//        $amount = '1';
        $response =  $mpesaRepository->stkPush($pay_id,$phone,$amount,url('api/dependant/packages/'.$pay_id));
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

    public function test_dependant_payments_target($package_id){
        $dpPackage = DependantPayment::findOrFail($package_id);
        $dpPackage->status = 2;
        $dpPackage->started_on = Carbon::now();
        $dpPackage->ends_on = Carbon::now()->addMonths(12);
        $dpPackage->save();
        $dep_ids = json_decode($dpPackage->dependant_ids);
        //update where records match
        Dependant::whereIn('id',$dep_ids)->update(['status'=>2,'expires_on'=>Carbon::now()->addMonths(12)]);
        return ['redirect'=>'member'];
    }
}
