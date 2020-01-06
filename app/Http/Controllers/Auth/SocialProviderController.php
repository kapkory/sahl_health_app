<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialProviderController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        try {
            $getInfo = Socialite::driver($provider)->user();
            $existUser = User::where('email',$getInfo->email)->first();

            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                $role = 'member';
                if (\request('type') == 'providers')
                    $role = 'provider';

                $user = $this->createUser($getInfo,$provider,$role);
                Auth::loginUsingId($user->id);
            }

            if (\auth()->user()->role == 'member')
                return redirect('complete-registration?type=social');

            return redirect(\auth()->user()->role);
        }
        catch (Exception $e) {
            return 'error';
        }
    }

    public function createUser($getInfo,$provider,$role=null){
        $password = Str::random(8);
        $user = new User;
        $user->name = $getInfo->name;
        $user->email = $getInfo->email;
        if ($provider == 'google')
            $user->google_id = $getInfo->id;

        if ($provider == 'facebook')
            $user->facebook_id = $getInfo->id;
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }
}
