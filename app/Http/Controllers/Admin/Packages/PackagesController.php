<?php

namespace App\Http\Controllers\Admin\Packages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Package;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PackagesController extends Controller
{
            /**
         * return package's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store package
     */
    public function storePackage(){
        request()->validate($this->getValidationFields(['name','duration','package_category_id','cost']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('packages', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $data['slug'] = Str::slug($data['name']);
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return package values
     */
    public function listPackages(){
        $packages = Package::join('package_categories','packages.package_category_id','=','package_categories.id')
        ->select('packages.*','package_categories.name as category');
        if(\request('all'))
            return $packages->get();
        return SearchRepo::of($packages)
            ->addColumn('action',function($package){
                $str = '';
                $json = json_encode($package);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'package_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/packages/delete').'\',\''.$package->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete package
     */
    public function destroyPackage($package_id)
    {
        $package = Package::findOrFail($package_id);
        $package->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Package deleted successfully']);
    }
}
