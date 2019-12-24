<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Identification;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class IdentificationController extends Controller
{
            /**
         * return identification's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store identification
     */
    public function storeIdentification(){
        request()->validate($this->getValidationFields(['name','is_provider']));
        $data = \request()->all();

        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('identifications', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        if ($data['is_provider'] == 'yes')
            $data['is_provider'] = 1;
        else
            $data['is_provider'] = 0;
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return identification values
     */
    public function listIdentifications(){
        $identifications = Identification::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $identifications->get();
        return SearchRepo::of($identifications)
            ->addColumn('action',function($identification){
                $str = '';
                $json = json_encode($identification);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'identification_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/identifications/delete').'\',\''.$identification->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete identification
     */
    public function destroyIdentification($identification_id)
    {
        $identification = Identification::findOrFail($identification_id);
        $identification->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Identification deleted successfully']);
    }
}
