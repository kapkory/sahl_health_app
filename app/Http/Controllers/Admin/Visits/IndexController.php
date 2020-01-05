<?php

namespace App\Http\Controllers\Admin\Visits;

use App\Http\Controllers\Controller;
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
            ['id','>',0]
        ]);
        if(\request('all'))
            return $visits->get();
        return SearchRepo::of($visits)
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
