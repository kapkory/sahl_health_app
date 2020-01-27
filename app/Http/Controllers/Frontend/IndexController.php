<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Core\ContactUs;
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

    public function memberRegister($referral_code){
        $user = User::where('referral_code',$referral_code)->get();
        if ($user->isEmpty())
            return redirect('register');

        return view('auth.register_form',compact('referral_code'));
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

    public function saveContacts(){
        $this->validate(\request(),['name'=>'required','email'=>'required','message'=>'required']);
        $contact = new ContactUs();
        $contact->name = \request('name');
        $contact->email = \request('email');
        $contact->phone = \request('phone');
        $contact->location = \request('location');
        $contact->message = \request('message');
        $contact->save();
        return redirect('/')->with('status', 'Thank you for your feedback, we shall Reach back as soon as possible');
    }
}
