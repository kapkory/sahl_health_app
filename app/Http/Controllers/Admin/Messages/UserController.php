<?php

namespace App\Http\Controllers\Admin\Messages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\UserMessage;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
            /**
         * return usermessage's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store usermessage
     */
    public function storeUserMessage(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('usermessages', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return usermessage values
     */
    public function listUserMessages(){
        $usermessages = UserMessage::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $usermessages->get();
        return SearchRepo::of($usermessages)
            ->addColumn('action',function($usermessage){
                $str = '';
                $json = json_encode($usermessage);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'usermessage_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/usermessages/delete').'\',\''.$usermessage->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete usermessage
     */
    public function destroyUserMessage($usermessage_id)
    {
        $usermessage = UserMessage::findOrFail($usermessage_id);
        $usermessage->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'UserMessage deleted successfully']);
    }
}
