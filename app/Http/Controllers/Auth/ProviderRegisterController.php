<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProviderRegisterController extends Controller
{
    public function registerProvider()
    {
        request()->validate([
            'full_name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'phone_number'=>'required|min:10',
            'password'=>'required|string|max:255',
//            'dob'=>'required|before:18 years ago'
        ]);

        $data[] = \request()->all();
        $user = User::create([
            'name' => \request('full_name'),
            'phone_number' => \request('phone_number'),
            'email' => \request('email'),
            'role' => 'provider',
            'password' => Hash::make(\request('password')),
        ]);
        Auth::login($user);

        return ['redirect_url'=>'provider/institution/create'];
    }
}
