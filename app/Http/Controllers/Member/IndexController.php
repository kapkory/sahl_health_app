<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Core\FavoriteInstitution;
use App\Models\Core\Institution;
use App\Models\Core\MemberPackage;
use App\Models\Core\MemberPayment;
use App\Models\Core\Package;
use App\Models\Core\Profile;
use App\Models\Core\Visit;
use App\Repositories\MpesaRepository;
use App\Repositories\TechpitMessageRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
//        $institutions = Institution::where('organization_type_id',1)->inRandomOrder()->limit(4)->get();
        $favorite_institutions = FavoriteInstitution::join('institutions','favorite_institutions.institution_id','=','institutions.id')
            ->where('favorite_institutions.user_id',auth()->id())
            ->where('institutions.organization_type_id',1)
            ->select('institutions.*')
            ->limit(3)
            ->get();

        $memberPackage = MemberPackage::where('member_id',auth()->id())->orderBy('created_at','desc')->first();
        $data = [];
        $data['visits'] = Visit::where('user_id',auth()->id())->count();
        return view($this->folder.'index',compact('memberPackage','favorite_institutions','data'));
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

        $user = \auth()->user();
        if (\request('type')=='social'){

            $user->phone_number = \request('phone_number');
            $user->save();
        }

        if (\request('type')=='account')
        {
            $user->phone_number = \request('phone_number');
            $user->password = bcrypt(\request('password'));
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

        if($user->phone_number){
            $address[]  = preg_replace('/^\\D*/', '', $user->phone_number);
            $message = 'Hi '.$user->name.', thank you for the signing up, complete your registration to save more when seeking medical service through your sahl Membership ';
            $techpitch = new TechpitMessageRepository();
            $response = @$techpitch->execute($message,$address);
        }

        return ['redirect_url'=>url('member/nominate-dependant')];
    }
}
