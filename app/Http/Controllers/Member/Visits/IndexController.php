<?php

namespace App\Http\Controllers\Member\Visits;

use App\Http\Controllers\Controller;
use App\Models\Core\Dependant;
use App\Models\Core\Institution;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Core\Visit;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class IndexController extends Controller
{
            /**
         * return visit's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    public function viewVisit($visit_id){
        $visit = Visit::findOrFail($visit_id);
        $role = 'Member';
        $name = '';
        if ($visit->dependant_id)
        {
            $role = 'Dependant';
            $dependant =  Dependant::findOrFail($visit->dependant_id);
            $name= $dependant->first_name.' '.$dependant->other_name.' '.$dependant->last_name;
        }
        else{
            $member = User::findOrFail($visit->user_id);
            $name = $member->name;
        }
        $institution = Institution::findOrFail($visit->institution_id);

        return view($this->folder.'view_visit',compact('name','role','visit','institution'));
    }


    /**
     * return visit values
     */
    public function listVisits(){
        $visits = Visit::where([
            ['user_id',auth()->id()]
        ]);
        if(\request('all'))
            return $visits->get();
        return SearchRepo::of($visits)
            ->addColumn('customer',function ($visit){
                $name = 'Me';
                if ($visit->dependant_id){
                    $dependant = Dependant::findOrFail($visit->dependant_id);
                    $name = 'Dependant: '.$dependant->first_name.' '.$dependant->last_name;
                }
                return '<span class="text-bold">'.$name.'</span>';

            })
            ->addColumn('visited_on',function ($visit){
                return Carbon::parse($visit->created_at)->diffForHumans();
            })
            ->addColumn('action',function($visit){
                $str = '';
                $json = json_encode($visit);
                $str.='<a href="'.url("member/visits/visit/".$visit->id).'" class="btn badge btn-info btn-sm"><i class="fa fa-eye"></i> View</a>';
                return $str;
            })->make();
    }

}
