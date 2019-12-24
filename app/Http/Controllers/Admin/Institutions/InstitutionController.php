<?php

namespace App\Http\Controllers\Admin\Institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Institution;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class InstitutionController extends Controller
{
            /**
         * return institution's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store institution
     */
    public function storeInstitution(){
        request()->validate($this->getValidationFields(['name']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('institutions', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return institution values
     */
    public function listInstitutions(){
        $institutions = Institution::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $institutions->get();
        return SearchRepo::of($institutions)
            ->addColumn('action',function($institution){
                $str = '';
                $json = json_encode($institution);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'institution_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/institutions/delete').'\',\''.$institution->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete institution
     */
    public function destroyInstitution($institution_id)
    {
        $institution = Institution::findOrFail($institution_id);
        $institution->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Institution deleted successfully']);
    }
}
