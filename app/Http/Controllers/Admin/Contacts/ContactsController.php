<?php

namespace App\Http\Controllers\Admin\Contacts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\ContactUs;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class ContactsController extends Controller
{
            /**
         * return contactus's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }


    /**
     * return contactus values
     */
    public function listContactuses(){
        $contactuses = ContactUs::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $contactuses->get();
        return SearchRepo::of($contactuses)
            ->addColumn('action',function($contactus){
                $str = '';
                $json = json_encode($contactus);
//                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'contactus_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/contacts/delete').'\',\''.$contactus->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete contactus
     */
    public function destroyContactUs($contactus_id)
    {
        $contactus = ContactUs::findOrFail($contactus_id);
        $contactus->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'ContactUs deleted successfully']);
    }
}
