<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Core\Institution;
use App\Models\Core\MemberPackage;
use App\Models\Core\MemberPayment;
use App\Models\Core\Package;
use App\Models\Core\Profile;
use App\Repositories\MpesaRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $institutions = Institution::where('organization_type_id',1)->inRandomOrder()->limit(4)->get();

        $memberPackage = MemberPackage::where('member_id',auth()->id())->orderBy('created_at','desc')->first();
        return view($this->folder.'index',compact('memberPackage','institutions'));
    }

    public function nominate(){
        return view($this->folder.'dependants');
    }
    public function payment(){
        $package = MemberPackage::where('member_id',auth()->id())->orderBy('created_at','desc')->first();
        return view($this->folder.'payment',compact('package'));
    }

    public function requestPayment(){
        $member_package = MemberPackage::where('member_id',auth()->id())->orderBy('created_at','desc')->first();

        $amount = $member_package->amount;
        $payment = new MemberPayment();
        $payment->member_id = auth()->id();
        $payment->payer_id = auth()->id();
        $payment->package_id = $member_package->package_id;
        $payment->amount = $amount;
        $payment->save();

        $mpesaRepository= new MpesaRepository();
        $phone = auth()->user()->phone_number;
//        $amount = '1';
        $response =  $mpesaRepository->stkPush($payment->id,$phone,$amount);
        $responses = json_decode($response,true);

        if (isset($responses['ResponseCode']) && $responses['ResponseCode']== 0){
            $checkoutRequestId = $responses['CheckoutRequestID'];
            $payment->reference = $checkoutRequestId;
            $payment->save();

            return ['redirect_url'=>url('member/payments')];
        }

        return ['redirect_url'=>url('member/payment')];
    }

    public function completeRegistration(){
        \request()->validate([
            'date_of_birth' => 'required|max:255',
            'identification_type' => 'required',
            'identification_number' => 'required|min:4',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|min:3',
        ]);

        $user = \auth()->user();
        $user->password = bcrypt(\request('password'));
        $user->save();

        $profile = Profile::updateOrCreate(['user_id'=>\auth()->id()],[
            'date_of_birth'=>Carbon::parse(\request('date_of_birth')),
            'identification_type_id'=>\request('identification_type'),
            'identification_number'=>\request('identification_number')
        ]);

        $package_id = \request('package_id');
        $pack = Package::findOrFail($package_id);
        $package = new MemberPackage();
        $package->member_id = \auth()->id();
        $package->package_id = $package_id;
        $package->amount = $pack->cost;
        $package->save();

        return ['redirect_url'=>url('member/nominate-dependant')];
    }

    public function completeMemberRegistration(){
        \request()->validate([
            'date_of_birth' => 'required|max:255',
            'identification_type' => 'required',
            'identification_number' => 'required|min:4',
            'package_id' => 'required',
        ]);

        if (\request('type')=='social'){
            $user = \auth()->user();
            $user->phone_number = \request('phone_number');
            $user->save();
        }


        $profile = Profile::updateOrCreate(['user_id'=>\auth()->id()],[
            'date_of_birth'=>Carbon::parse(\request('date_of_birth')),
            'identification_type_id'=>\request('identification_type'),
            'identification_number'=>\request('identification_number')
        ]);

        $package_id = \request('package_id');
        $pack = Package::findOrFail($package_id);
        $package = new MemberPackage();
        $package->member_id = \auth()->id();
        $package->package_id = $package_id;
        $package->amount = $pack->cost;
        $package->save();

        return ['redirect_url'=>url('member/nominate-dependant')];
    }
}
