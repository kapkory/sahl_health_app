<?php

namespace App\Http\Controllers\Admin\Packages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\PackageCategory;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PackageCategoryController extends Controller
{
            /**
         * return packagecategory's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store packagecategory
     */
    public function storePackageCategory(){
        request()->validate($this->getValidationFields(['name']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('package_categories', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $data['slug'] = Str::slug($data['name']);
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return packagecategory values
     */
    public function listPackageCategories(){
        $packagecategories = PackageCategory::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $packagecategories->get();
        return SearchRepo::of($packagecategories)
            ->addColumn('action',function($packagecategory){
                $str = '';
                $json = json_encode($packagecategory);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'packagecategory_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
//                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/packagecategories/delete').'\',\''.$packagecategory->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete package category
     */
    public function destroyPackageCategory($packagecategory_id)
    {
        $packagecategory = PackageCategory::findOrFail($packagecategory_id);
        $packagecategory->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'PackageCategory deleted successfully']);
    }
}
