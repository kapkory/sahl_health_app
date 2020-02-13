<?php

namespace App\Http\Controllers\Provider\Messages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Contact;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class ContactsController extends Controller
{
            /**
         * return contact's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store contact
     */
    public function storeContact(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('contacts', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $data['institution_id'] = auth()->user()->institution_id;
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return contact values
     */
    public function listContacts(){
        $contacts = Contact::where([
            ['institution_id','=',auth()->user()->institution_id]
        ]);
        if(\request('all'))
            return $contacts->get();
        return SearchRepo::of($contacts)
            ->addColumn('action',function($contact){
                $str = '';
                $json = json_encode($contact);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'contact_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/messages/contacts/delete').'\',\''.$contact->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete contact
     */
    public function destroyContact($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);
        $contact->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Contact deleted successfully']);
    }
}
