<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function memberRegistration(){
         return view('auth.member_registration');
    }

    public function memberPackages(){
        return view('core.member.packages');
    }
}
