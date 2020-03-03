<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Core\Dependant;
use App\Models\Core\FavoriteInstitution;
use App\Models\Core\Institution;
use App\Models\Core\MemberPackage;
use App\Models\Core\MemberPayment;
use App\Models\Core\Package;
use App\Models\Core\Profile;
use App\Models\Core\Referral;
use App\Models\Core\Visit;
use App\Repositories\MpesaRepository;
use App\Repositories\StatusRepository;
use App\Repositories\TechpitMessageRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $data['savings'] = 0;
        if ($data['visits'] > 0){
            $savings = Visit::join('institutions','institutions.id','=','visits.institution_id')
                ->where([
                    ['visits.user_id',auth()->id()]
                ])->select(DB::raw('sum(visits.amount *institutions.discount) as savings'))
                ->first();
            $data['savings'] = $savings->savings / 100;
        }

        $user = auth()->user();
        if(!$user->referral_code)
        {
            $user->referral_code = uniqid();
            $user->save();
        }
        if(!$user->verification_code)
        {
            $user->verification_code = rand(999,100000);
            $user->save();
        }

        $data['referrals'] = Referral::where('user_id',auth()->id())->count();
        return view($this->folder.'index',compact('memberPackage','favorite_institutions','data'));
    }

    public function nominate(){
        return view($this->folder.'dependants');
    }


    public function payment(){
        $package = MemberPackage::where('member_id',auth()->id())->orderBy('created_at','desc')->first();
        return view($this->folder.'payment',compact('package'));
    }

    public function verifyUser(){
        $code = \request('code');
        $user= User::where('verification_code',$code)->first();
        if (!$user)
            return redirect()->back()->with('notice',['type'=>'error','message'=>'Enter a Valid Code']);

        $user->verified_at = Carbon::now()->toDateTimeString();
        $user->save();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Your Phone Number has been successfully verified']);
    }

    public function generateToken(){
        $user= auth()->user();
        if($user->phone_number){
            $address[]  = preg_replace('/^\\D*/', '', $user->getFormattedPhone());
            $message = 'Your verification Code is : '.$user->verification_code;
            $techpitch = new TechpitMessageRepository();
          $response = @$techpitch->execute($message,$address);
        }
        return ['status'=>true, 'message'=>'Verification Code has been sent to your Mobile Phone'];
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

        $referral = Referral::where('referral_id',auth()->id())->first();
        if ($referral){
            $referral->amount = (20 * $amount) / 100;
            $referral->save();
        }

        $mpesaRepository= new MpesaRepository();
        $phone = auth()->user()->getFormattedPhone();
//        return $this->test_member_payment($payment->id);
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

//this was used to test mpesa callback locally if hit everything works fine
    public function test_member_payment($payment_id){
        $pay = MemberPayment::findOrFail($payment_id);
        $pay->reference = '$resp->Body->stkCallback->CheckoutRequestID';
        $pay->comment = '$resp->Body->stkCallback->ResultDesc';
        $pay->status = 2;
        $pay->save();

        $memberPackage = MemberPackage::where('member_id',$pay->member_id)
            ->where('package_id',$pay->package_id)
            ->orderBy('created_at','desc')
            ->first();
        $package = Package::findOrFail($pay->package_id);
        $expiry = Carbon::now()->addMonths($package->duration)->toDateString();
        $memberPackage->started_on = Carbon::now()->toDateString();
        $memberPackage->ends_at =$expiry ;
        $memberPackage->save();


        //if package is for 3 people, member is included plus two dependants
        $package_members = $package->number_of_members;
        $member_count = $package_members - 1;
        if ( $package_members > 1 && auth()->user()->dependants()->count() > 0){
            Dependant::where('user_id',auth()->id())->limit($member_count)
                ->update(['status'=>StatusRepository::getDependantSubscriptionStatus('active'),
                    'expires_on'=>$expiry]);
        }

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

        }

        if (\request('type')=='account')
        {
            $user->phone_number = \request('phone_number');
            $user->password = bcrypt(\request('password'));

        }
        if (\request('type')=='referred')
        {
            $user->password = bcrypt(\request('password'));
        }
        $user->referral_code = uniqid();
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

        if($user->phone_number){
            $address[]  = preg_replace('/^\\D*/', '', $user->getFormattedPhone());
            $message = 'Hi '.$user->name.', thank you for the signing up, complete your registration to save more when seeking medical service through your Sahl Membership ';
            $techpitch = new TechpitMessageRepository();
            $response = @$techpitch->execute($message,$address);
        }

        //redirect individual user to payment, incase he needs to add dependants, he will do so in the backend
        if ($pack->number_of_members == 1)
            return ['redirect_url'=>url('member/payment')];

        //if package is for more than one individual
        return ['redirect_url'=>url('member/nominate-dependant')];
    }
}
