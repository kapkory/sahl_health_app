<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view($this->folder.'index');
    }

    public function registration(){
        return view($this->folder.'registration');
    }

    public function createInstitution(){
        return view($this->folder.'create_institution');
    }
}
