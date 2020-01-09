<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Service;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class ServiceController extends Controller
{
            /**
         * return service's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store service
     */
    public function storeService(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('services', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return service values
     */
    public function listServices(){
        $services = Service::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $services->get();
        return SearchRepo::of($services)
            ->addColumn('action',function($service){
                $str = '';
                $json = json_encode($service);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'service_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/services/delete').'\',\''.$service->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete service
     */
    public function destroyService($service_id)
    {
        $service = Service::findOrFail($service_id);
        $service->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Service deleted successfully']);
    }
}
