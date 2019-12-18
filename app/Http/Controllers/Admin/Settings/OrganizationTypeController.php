<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\OrganizationType;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class OrganizationTypeController extends Controller
{
            /**
         * return organizationtype's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store organizationtype
     */
    public function storeOrganizationType(){
        request()->validate($this->getValidationFields(['name']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('organization_types', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $data['slug'] = Str::slug($data['name']);
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return organizationtype values
     */
    public function listOrganizationTypes(){
        $organizationtypes = OrganizationType::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $organizationtypes->get();
        return SearchRepo::of($organizationtypes)
            ->addColumn('action',function($organizationtype){
                $str = '';
                $json = json_encode($organizationtype);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'organizationtype_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/organizationtypes/delete').'\',\''.$organizationtype->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete organizationtype
     */
    public function destroyOrganizationType($organizationtype_id)
    {
        $organizationtype = OrganizationType::findOrFail($organizationtype_id);
        $organizationtype->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'OrganizationType deleted successfully']);
    }
}
