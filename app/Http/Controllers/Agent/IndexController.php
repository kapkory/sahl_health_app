<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Core\Referral;
use App\Models\Core\Visit;
use App\Repositories\TechpitMessageRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $data = [];
        $data['revenue'] = 0;
        $data['visits'] = 0;
        $data['customer_savings'] = 0;


        return view($this->folder.'index',compact('data'));
    }

    public function registration(){
        return view($this->folder.'registration');
    }

    public function registerAgent()
    {
        request()->validate([
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|max:255',
//            'dob'=>'required|before:18 years ago'
        ]);

        $data[] = \request()->all();
        $user = User::create([
            'name' => \request('first_name').' '.\request('last_name'),
            'email' => \request('email'),
            'role' => 'agent',
            'password' => Hash::make(\request('password')),
        ]);
        Auth::login($user);

        return ['redirect_url'=>'agent'];
    }
}
