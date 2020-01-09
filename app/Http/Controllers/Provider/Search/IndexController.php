<?php

namespace App\Http\Controllers\Provider\Search;

use App\Http\Controllers\Controller;
use App\Models\Core\Dependant;
use App\Models\Core\Institution;
use App\Models\Core\Visit;
use App\Repositories\TechpitMessageRepository;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view($this->folder.'index');
    }

    public function searchMembers(){
        $search = \request('search');
        $users = User::leftJoin('profiles','profiles.user_id','=','users.id')
            ->where([
                ['users.role','=','member'],
                ['profiles.identification_number','=',$search],
            ])
            ->select("users.*")->get();
        if ($users->isEmpty())
            $users = User::leftJoin('profiles','profiles.user_id','=','users.id')
                ->where([
                    ['users.role','=','member'],
                    ['users.name','LIKE','%'.$search.'%'],
                ])
                ->select("users.*")->get();

        return $users;
    }

    public function confirmVisit(){
        $visit = new Visit();
        if (\request('type') =='mb')
        $visit->user_id = \request('user_id');
        else
            $visit->dependant_id = \request('user_id');
        $visit->institution_id = auth()->user()->institution_id;
        $visit->save();
        return ['redirect_url'=>url('provider/search/'.$visit->id)];
    }

    public function viewVisit($visit_id){
        $visit = Visit::findOrFail($visit_id);
        $role = 'Member';
        $name = '';
        if ($visit->user_id)
        {
            $member = User::findOrFail($visit->user_id);
            $name = $member->name;
        }
        else{
            $role = 'Dependant';
            $dependant =  Dependant::findOrFail($visit->dependant_id);
            $name= $dependant->first_name.' '.$dependant->other_name.' '.$dependant->last_name;
        }
        $institution = Institution::findOrFail(auth()->user()->institution_id);

        return view($this->folder.'visit',compact('name','role','visit','institution'));
    }

    public function confirmBill($visit_id){
        $visit = Visit::findOrFail($visit_id);
        $visit->amount = \request('total_bill');
        $visit->save();
        if (auth()->user()->phone_number){
            $address[]  = preg_replace('/^\\D*/', '', auth()->user()->phone_number);
            $message = 'Hi '.\request('name').', thanks for the sign up- become now an empowered customer when seeking medical services through membership.';
            $techpitch = new TechpitMessageRepository();
            $response = $techpitch->execute($message,$address);
        }

        return ['redirect_url'=>'provider/search/'.$visit->id];
    }
}
