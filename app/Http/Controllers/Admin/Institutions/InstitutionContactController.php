<?php

namespace App\Http\Controllers\Admin\Institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\InstitutionContact;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class InstitutionContactController extends Controller
{


    /**
     * return institutioncontact values
     */
    public function listInstitutionContacts($institution_id){
        $institutioncontacts = InstitutionContact::where([
            ['institution_id',$institution_id]
        ]);
        if(\request('all'))
            return $institutioncontacts->get();
        return SearchRepo::of($institutioncontacts)
            ->addColumn('action',function($institutioncontact){
                $str = '';
                $json = json_encode($institutioncontact);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'institutioncontact_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/institutioncontacts/delete').'\',\''.$institutioncontact->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }
}
