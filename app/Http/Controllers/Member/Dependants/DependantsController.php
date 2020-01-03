<?php

namespace App\Http\Controllers\Member\Dependants;

use App\Http\Controllers\Controller;
use App\Models\Core\Identification;
use Illuminate\Http\Request;

use App\Models\Core\Dependant;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class DependantsController extends Controller
{
            /**
         * return dependant's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store dependant
     */
    public function storeDependant(){
        request()->validate($this->getValidationFields(['first_name','last_name','relationship_type']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('dependants', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $this->autoSaveModel($data);
        return redirect()->back();
    }
    //returns api results
    public function addDependant(){
        request()->validate($this->getValidationFields(['first_name','last_name','relationship_type']));
        $dependant = new Dependant();
        $dependant->user_id = auth()->id();
        $dependant->first_name = \request('first_name');
        $dependant->last_name = \request('last_name');
        if (\request('identification_type'))
        {
            $dependant->identification_type_id = \request('identification_type');
            $dependant->identification_number = \request('identification_number');
        }
        $dependant->relationship_type = \request('relationship_type');
        $dependant->save();
        if (\request('add_dependant') == 0)
            return ['redirect_url'=>url('member/payment')];

        return ['redirect_url'=>url('member/nominate-dependant?added=true')];

    }

    /**
     * return dependant values
     */
    public function listDependants(){
        $dependants = Dependant::where([
            ['user_id','=',auth()->id()]
        ]);
        if(\request('all'))
            return $dependants->get();
        return SearchRepo::of($dependants)
            ->addColumn('name',function($dependant){
              return   $dependant->first_name.' '.$dependant->other_name.' '.$dependant->last_name;
            })
            ->addColumn('identification_type',function($dependant){
                if ($dependant->identification_type_id)
                    return @Identification::findOrFail($dependant->identification_type_id)->name .' '.$dependant->identification_number;
              return  'N/A';
            })
            ->addColumn('action',function($dependant){
                $str = '';
                $json = json_encode($dependant);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'dependant_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/dependants/delete').'\',\''.$dependant->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete dependant
     */
    public function destroyDependant($dependant_id)
    {
        $dependant = Dependant::findOrFail($dependant_id);
        $dependant->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Dependant deleted successfully']);
    }
}
