<?php

namespace App\Http\Controllers\Admin\Settings\Institution_levels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\InstitutionLevel;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class InstitutionLevelController extends Controller
{
            /**
         * return instituitionlevel's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store instituitionlevel
     */
    public function storeInstituitionLevel(){
        request()->validate($this->getValidationFields(['name','facilities']));
        $data = \request()->all();
        if(!isset($data['created_by'])) {
            if (Schema::hasColumn('institution_levels', 'created_by'))
                $data['created_by'] = request()->user()->id;
        }
        $data['slug'] = Str::slug($data['name']);
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return instituitionlevel values
     */
    public function listInstituitionLevels(){
        $instituitionlevels = InstitutionLevel::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $instituitionlevels->get();
        return SearchRepo::of($instituitionlevels)
            ->addColumn('action',function($instituitionlevel){
                $str = '';
                $json = json_encode($instituitionlevel);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'instituitionlevel_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/institution_levels/delete').'\',\''.$instituitionlevel->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete instituitionlevel
     */
    public function destroyInstituitionLevel($instituitionlevel_id)
    {
        $instituitionlevel = InstitutionLevel::findOrFail($instituitionlevel_id);
        $instituitionlevel->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'InstituitionLevel deleted successfully']);
    }
}
