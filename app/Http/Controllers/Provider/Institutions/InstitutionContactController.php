<?php

namespace App\Http\Controllers\Provider\Institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\InstitutionContact;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class InstitutionContactController extends Controller
{
            /**
         * return institutioncontact's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store institutioncontact
     */
    public function storeInstitutionContact(){
        request()->validate($this->getValidationFields(['name','email','role_of_contact']));
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('institution_contacts', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $data['role'] = $data['role_of_contact'];
        unset($data['role_of_contact']);
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return institutioncontact values
     */
    public function listInstitutionContacts(){
        $institutioncontacts = InstitutionContact::where([
            ['id','>',0]
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

    /**
     * delete institutioncontact
     */
    public function destroyInstitutionContact($institutioncontact_id)
    {
        $institutioncontact = InstitutionContact::findOrFail($institutioncontact_id);
        $institutioncontact->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'InstitutionContact deleted successfully']);
    }
}
