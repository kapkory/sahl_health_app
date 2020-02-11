<?php

namespace App\Http\Controllers\User;

use App\Models\Core\Profile;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    //
    public function profile(){

        return view($this->folder.'profile',[
            'user'=>request()->user()
        ]);

    }

    public function updateProfile(){
        request()->validate([
            'name'=>'required'
        ]);
        $user = request()->user();
        $user->name = request('name');
        $user->email = request('email');
//        $user->identification_type = request('identification_type');
//        $user->identification_number = request('identification_number');
        $user->update();

        $profile = Profile::where('user_id',$user->id)->first();

        if ($profile){
            $profile-> identification_type_id  = \request('identification_type');
            $profile->identification_number = \request('identification_number');
            $profile->save();
        }
        else{
          $prof = new Profile();
          $prof->user_id = auth()->id();
            $prof->identification_type_id = \request('identification_type');
            $prof->identification_number = \request('identification_number');
            $prof->save();
        }


        return redirect()->back()->with('notice',['type'=>'success','message'=>'Profile changed successful']);
    }
    public function updateInitialUser(){
        request()->validate([
            'password'=>'required|confirmed',
        ]);
        $user = request()->user();
        $user->password = bcrypt(request('password'));
        $user->update();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Password updated, Welcome on board!']);
    }

    public function updatePassword(){
        request()->validate([
            'password'=>'required|confirmed',
        ]);
        $user = request()->user();
        $user->password = bcrypt(request('password'));
        $user->update();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Password changed successful']);
    }

    public function changeUserState($state){

        $user = Auth::user();
        $user->online = $state;
        if($state == 1){
            $user->last_seen = Carbon::now();
        }
        $user->update();
    }
}
