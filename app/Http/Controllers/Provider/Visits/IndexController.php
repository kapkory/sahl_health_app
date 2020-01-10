<?php

namespace App\Http\Controllers\Provider\Visits;

use App\Http\Controllers\Controller;
use App\Models\Core\Dependant;
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

    /**
     * store visit
     */
    public function storeVisit(){
        request()->validate($this->getValidationFields());
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
        $visits = Visit::where([
            ['id','>',0],
            ['institution_id',auth()->user()->institution_id]
        ]);
        if(\request('all'))
            return $visits->get();
        return SearchRepo::of($visits)
            ->addColumn('customer',function ($visit){
                $user = User::findOrFail($visit->user_id);
                $name = $user->name;
                if ($visit->dependant_id){
                    $dependant = Dependant::findOrFail($visit->dependant_id);
                    $name = $dependant->first_name.' '.$dependant->last_name;
                }
                return $name;

            })
            ->addColumn('visited_on',function ($visit){
                return Carbon::parse($visit->created_at)->diffForHumans();
            })
            ->addColumn('action',function($visit){
                $str = '';
                $json = json_encode($visit);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'visit_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/visits/delete').'\',\''.$visit->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
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
