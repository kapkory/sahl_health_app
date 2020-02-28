<?php

namespace App\Http\Controllers\Admin\Users;

use App\Events\UserCreated;
use App\Jobs\UnsuspendUser;
use App\Jobs\UpdateTransactions;
use App\Models\Core\Assign;
use App\Models\Core\Order;
use App\Models\Core\Website;
use App\Notifications\GeneralNotification;
use App\Repositories\LogsRepository;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notifications\InitialAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use Illuminate\Auth\Passwords\PasswordBroker;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index($id){
        $unpaid = 0;
        $user = User::findOrFail($id);
        $tabs = ['info'];

        return view($this->folder.'user.index',[
            'user'=>$user,
            'tabs'=>$tabs
        ]);
    }

    public function searchUsers(){
        $term = request('term');

        $users = User::where([
            ['name','like',"%$term%"]
        ])->orWhere([
            ['email','like',"%$term%"]
        ])->select(DB::raw('CONCAT(name, "-", email) AS text'),'id')->limit(10)->orderBy('name','asc')->get();
        return [
            'results'=>$users,
            'pagination'=>[
                'more'=>false
            ]
        ];

    }

    public function getDates($user){
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $month = array_search(request('month'),$months)+1;
        $year = request('year');
        $date = Carbon::create($year,$month);
        $tuesdays = [];
        $next_month = Carbon::create($year,$month)->addMonth();
        while($next_month>$date){
            if($date->isTuesday())
                $tuesdays[] = $date->toDateString();


        }
        dd($date);
    }


    public function storeUser(){

        request()->validate($this->getValidationFields(['name','phone_number','role','email']));
        $data = \request()->all();

//        $data['role'] = \request()->user_role;
//        unset($data['user_role']);
        if(\request('password') != ''){
            $data['password'] = \request()->password;
        }
//            dd($data,\request()->password);
//        if(!\request('id')){
//            $data['password'] = bcrypt($data['password']);
//        }

        $user = $this->autoSaveModel($data);
//        $token = app('auth.password.broker')->createToken($user);
//        $url = "password/reset/" . $token;
//        $notification = new InitialAccount($token, $url, $user->name);
//        $user->notify($notification);
        return redirect()->back()->with('notice',['type'=>'success','message'=>'User has been successfully created']);
    }

    public function updateUserPassword($id){
        \request()->validate([
            'new_password'=>'required'
        ]);
        $user = User::findOrFail($id);
        $user->password = Hash::make(request('new_password'));
        $user->update();
        $user->new_password = \request('new_password');
//        $user->notify(new GeneralNotification('change-user-password',null,null,null,\request('new_password')));
        return redirect()->back()->with('notice',['type'=>'success','message'=>'User password changed']);
    }



    public function active($user_id){
        $user = User::whereId($user_id)->firstOrFail();
         $user->status = 1;
        $user->save();

        return back();
    }

    public function unsuspend($user_id){
        $user = User::whereId($user_id)->firstOrFail();
        $user->status = 1;
        $user->save();
//        LogsRepository::storeLog('user_suspend','un-suspended/Resumed user: <b>'.$user->name.'('.$user->role.')</b>');
        return back()->with('notice',['type'=>'success','message'=>'User has been resumed']);
    }

    public function deactivate($user_id){
        $user = User::whereId($user_id)->firstOrFail();
        $user->status = StatusRepository::getUserStatus('deactivated');
        $user->save();

        return back();
    }

    public function deleteUser($user_id){
        $user = User::whereId($user_id)->firstOrFail();
        $user->delete();

        return back()->with('notice',['type'=>'success','message'=>'User has been deleted successfully']);
    }

}
