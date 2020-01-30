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
        {
            $visit->user_id = \request('member_id');
            $visit->dependant_id = \request('user_id');//dependant
        }
        $visit->institution_id = auth()->user()->institution_id;
        $visit->save();

        $member = User::findOrFail($visit->user_id);
        $institution = Institution::findOrFail(auth()->user()->institution_id);

        $address[] = $member->phone_number;
        $message = 'Thank you for visiting '.$institution->name.'. Kindly rate your experience by following this Link '.url(' member/visits/visit/'.$visit->id.'?rating=true');
        $techpitch = new TechpitMessageRepository();
        $response = @$techpitch->execute($message,$address);

        return ['redirect'=>url('provider/search/'.$visit->id),'title'=>'User visit has been confirmed'];
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
        $user = User::findOrFail($visit->user_id);
        if ($user->phone_number){
            $institution = Institution::findOrFail(auth()->user()->institution_id );
            $address[]  = preg_replace('/^\\D*/', '', $user->phone_number);
            $names = explode(' ',$user->name);
            $total_bill = \request('total_bill');
            $amount = ($institution->discount * \request('total_bill')) / 100;
            $discounted_bill = $total_bill - $amount;
            $message = 'Hi '.$names[0].', your discounted bill is '.$discounted_bill.', you have saved '.$amount. ' at '.$institution->name;
            $techpitch = new TechpitMessageRepository();
            $response = $techpitch->execute($message,$address);
        }

        return redirect('provider/visits');
    }
}
