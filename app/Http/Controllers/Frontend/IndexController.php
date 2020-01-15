<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Core\PackageCategory;
use App\Models\Core\Referral;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function memberRegistration(){
         return view('auth.member_register');
    }

    public function memberPackages(){
        $categories = PackageCategory::all();
        return view('core.member.packages',compact('categories'));
    }

    public function referredMember($referral_id, $referral_code){
        $referral = Referral::findOrFail($referral_id);

        $user = User::where('referral_code',$referral_code)->first();
        if (!$user)
            return false;
        else
        {
            if ($user->id == $referral->user_id){
                $referral->status = 1;
                $referral->save();
                $user = User::findOrFail($referral->referral_id );
                Auth::login($user);
                return redirect('complete-registration?type=referred');
            }
        }
        return false;
    }
}
