<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherPagesController extends Controller
{
    public function privacyPolicy(){
       return view($this->folder.'other-pages.privacy');
    }

    public function advertisingPolicy(){
        return view($this->folder.'other-pages.adverts');
    }

    public function cookiePolicy(){
        return view($this->folder.'other-pages.cookie');
    }

    public function terms(){
        return view($this->folder.'other-pages.terms');
    }


}
