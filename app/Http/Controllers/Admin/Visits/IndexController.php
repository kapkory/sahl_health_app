<?php

namespace App\Http\Controllers\Admin\Visits;

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
     * store visit
     */
    public function storeVisit(){
        request()->validate($this->getValidationFields(['name']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('visits', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return visit values
     */
    public function listVisits(){
        $visits = Visit::join('institutions','institutions.id','=','visits.institution_id')
            ->select('visits.*','institutions.name as institution','institutions.discount');
        if(\request('all'))
            return $visits->get();
        return SearchRepo::of($visits)
            ->addColumn('amount',function ($visit){
                $discount = ($visit->amount * $visit->discount) /100;
                $paid = $visit->amount - $discount;
                return '<div><span>Paid: <b class="text-indigo">'.$paid.'</b></span><br>
                         <span>Saved: <b class="text-success">'.$discount.'</b></span></div>';
            })
            ->addColumn('customer',function ($visit){
                $name = '<b>Member</b>: '.auth()->user()->name;
                if ($visit->dependant_id){
                    $dependant = Dependant::findOrFail($visit->dependant_id);
                    $name = '<b>Dependant</b>: '.$dependant->first_name.' '.$dependant->last_name;
                }
                return '<span class="text-bold">'.$name.'</span>';

            })
            ->addColumn('visited_on',function ($visit){
                return Carbon::parse($visit->created_at)->diffForHumans();
            })
            ->addColumn('action',function($visit){
                $str = '';
                $json = json_encode($visit);
                $str.='<a href="'.url("admin/visits/visit/".$visit->id).'" class="btn badge btn-info btn-sm"><i class="fa fa-eye"></i> View</a>';
                return $str;
            })->make();
    }

    /**
     * delete visit
     */
    public function destroyVisit($visit_id)
    {
        $visit = Visit::findOrFail($visit_id);
        $visit->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Visit deleted successfully']);
    }
}
