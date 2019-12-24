<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (Auth::user()){
            return $this->authCheck();
        }else{
//            return view('home');
            return redirect('login')->send();
        }
    }

    public function authCheck(){
        $user = Auth::user();
        $role=$user->role;
        if ($role == 'provider' && !$user->institution_id)
            return redirect('provider/institution/create');
        return redirect($role)->send();
    }
}
