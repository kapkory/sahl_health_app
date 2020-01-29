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
        if (\request('id'))
            request()->validate($this->getValidationFields(['name','duration','package_category_id','cost']));
        else
            request()->validate($this->getValidationFields(['name','icon','duration','package_category_id','cost']));

        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('packages', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }

        $data['slug'] = Str::slug($data['name']);
        if (isset($data['icon'])){
            $image = request()->file('icon');
            $ext = $image->getClientOriginalExtension();
            $name = $data['slug']. "." . $ext;
            $image->move(storage_path() . '/app/public/packages', $name);
            $data['icon'] = 'storage/packages/'.$name;
        }

        if ($data['id'] && $data['icon'] == ''){
            $package = Package::findOrFail($data['id']);
            $data['icon'] = $package->icon;
        }


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
                if ($package->status == 0)
                    $str.='&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url('admin/packages/'.$package->id.'/mark').'\');" class="btn badge btn-outline-secondary btn-sm"><i class="fa fa-trash"></i> Mark as Inactive</a>';
                else
                    $str.='&nbsp;&nbsp;<a href="#" onclick="runPlainRequest(\''.url(request()->user()->role.'/packages/'.$package->id.'/mark').'\');" class="btn badge btn-outline-success btn-sm"><i class="fa fa-check"></i> Mark Active</a>';

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

    public function markStatus($id){
        $package = Package::findOrfail($id);
        $state = 0;
        if ($package->status == 0)
            $state = 1;
        $package->status = $state;
        $package->save();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Package State has been changed successfully']);

    }
}
