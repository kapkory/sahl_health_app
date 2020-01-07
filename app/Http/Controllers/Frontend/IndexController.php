<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Core\PackageCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function memberRegistration(){
         return view('auth.member_register');
    }

    public function memberPackages(){
        $categories = PackageCategory::all();
        return view('core.member.packages',compact('categories'));
    }
}
