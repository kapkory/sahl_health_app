<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Core\MemberPackage;
use App\Models\Core\Package;
use App\Models\Core\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view($this->folder.'index');
    }

    public function nominate(){
        return view($this->folder.'dependants');
    }
    public function payment(){
        return view($this->folder.'payment');
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
}
