<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Core\MemberPackage;
use App\Models\Core\Package;
use App\Models\Core\Profile;
use App\Models\Core\Referral;
use App\Repositories\TechpitMessageRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:13'],
            'identification_number' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'identification_type' => $data['identification_type'],
            'identification_number' => $data['identification_number'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function memberRegistration(){
        $this->validate(\request(), [
            'name' => 'required|max:255',
            'email' => 'required',
            'phone_number' => 'required|min:10',
        ]);
        $user = new User();
        $user->name = \request('name');
        $user->email = \request('email');
        $user->phone_number = \request('phone_number');
        $user->password = bcrypt(\request('email'));
        $user->verification_code = rand(999,100000);
        $user->save();
        Auth::login($user);


        $address[]  = preg_replace('/^\\D*/', '', $user->getFormattedPhone());
        $message = 'Hi '.\request('name').', thanks for the sign up- become now an empowered customer when seeking medical services through membership.';
        $techpitch = new TechpitMessageRepository();
//        dd($message,$address);
        $response = $techpitch->execute($message,$address);
        return ['redirect'=>url('member-packages')];
    }
    public function registerMember(){
        $this->validate(\request(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = \request('first_name').' '.\request('other_name').' '.\request('last_name');
        $user->email = \request('email');
        $user->phone_number = preg_replace('/\s+/', '', \request('phone_number'));
        $user->referral_code = uniqid();
        $user->verification_code = rand(999,100000);
        $user->password = bcrypt(\request('password'));
        $user->save();
        Auth::login($user);

        if (\request('referral_code') != ''){
            $referrer = User::where('referral_code',\request('referral_code'))->first();
            if ($referrer){
                $referral = new Referral();
                $referral->user_id = $referrer->id;
                $referral->referral_id = $user->id;
                $referral->save();
            }
        }

        return ['redirect_url'=>url('complete-registration?type=email')];
    }

    public function createAccount(){
        $this->validate(\request(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required',
        ]);
        $user = new User();
        $user->name = \request('first_name').' '.\request('last_name');
        $user->email = \request('email');
        $user->password = bcrypt(\request('email'));
        $user->verification_code = rand(999,100000);
        $user->save();
        Auth::login($user);

        return redirect(url('complete-registration?type=account'));
    }

}
