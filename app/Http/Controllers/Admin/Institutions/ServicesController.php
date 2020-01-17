<?php

namespace App\Http\Controllers\Admin\Institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\InstitutionService;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class ServicesController extends Controller
{


    /**
     * return institutionservice values
     */
    public function listInstitutionServices($institution_id){
        $institutionservices = InstitutionService::join('services','institution_services.service_id','=','services.id')
            ->where('institution_services.institution_id',$institution_id)
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

}
