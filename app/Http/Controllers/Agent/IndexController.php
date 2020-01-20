<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Core\Referral;
use App\Models\Core\Visit;
use App\Repositories\TechpitMessageRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $data = [];
        $data['revenue'] = 0;
        $data['visits'] = 0;
        $data['customer_savings'] = 0;


        return view($this->folder.'index',compact('data'));
    }

}
