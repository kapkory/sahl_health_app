<?php

namespace App\Http\Controllers\Provider\Institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\InstitutionService;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class ServicesController extends Controller
{
            /**
         * return institutionservice's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store institutionservice
     */
    public function storeInstitutionService(){
        request()->validate($this->getValidationFields(['services']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('institution_services', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $data['service_id'] = \request('services');
        unset($data['services']);

        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return institutionservice values
     */
    public function listInstitutionServices(){
        $institutionservices = InstitutionService::join('services','institution_services.service_id','=','services.id')
        ->select('institution_services.*','services.name as service');
        if(\request('all'))
            return $institutionservices->get();
        return SearchRepo::of($institutionservices)
            ->addColumn('action',function($institutionservice){
                $str = '';
                $json = json_encode($institutionservice);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'institutionservice_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/institutionservices/delete').'\',\''.$institutionservice->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete institutionservice
     */
    public function destroyInstitutionService($institutionservice_id)
    {
        $institutionservice = InstitutionService::findOrFail($institutionservice_id);
        $institutionservice->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'InstitutionService deleted successfully']);
    }
}
