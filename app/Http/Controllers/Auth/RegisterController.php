<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Core\Profile;
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
        $user->save();
        Auth::login($user);
        return ['redirect_url'=>url('member-packages')];
    }

    public function completeRegistration(){
        $this->validate(\request(), [
            'date_of_birth' => 'required|max:255',
            'identification_type' => 'required',
            'identification_number' => 'required|min:4',
            'password' => 'required|min:10',
            'password_confirmation' => 'required|min:10',
        ]);
        $user = \auth()->user();
        $user->password = \request('password');
        $user->save();

        $profile = Profile::updateOrCreate(['user_id'=>\auth()->id()],[
            'date_of_birth'=>Carbon::parse(\request('date_of_birth')),
            'identification_type_id'=>\request('identification_type'),
            'identification_number'=>\request('identification_number')
        ]);

        return view('auth.complete_registration');
    }
}
