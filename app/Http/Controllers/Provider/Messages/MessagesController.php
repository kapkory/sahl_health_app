<?php

namespace App\Http\Controllers\Provider\Messages;

use App\Http\Controllers\Controller;
use App\Models\Core\UserMessage;
use App\Repositories\TechpitMessageRepository;
use App\User;
use Illuminate\Http\Request;

use App\Models\Core\Message;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class MessagesController extends Controller
{
            /**
         * return message's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store message
     */
    public function storeMessage(){
        request()->validate($this->getValidationFields(['message']));
        $data = \request()->all();

        $data['user_id'] = request()->user()->id;
        $message = $this->autoSaveModel($data);

        return redirect()->back()->with('notice',['type'=>'success','message'=>'Messages has been created']);
    }

    /**
     * return message values
     */
    public function listMessages(){
        $messages = Message::where([
            ['user_id',auth()->id()]
        ]);
        if(\request('all'))
            return $messages->get();
        return SearchRepo::of($messages)
            ->addColumn('action',function($message){
                $str = '';
                $json = json_encode($message);
//                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'message_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-eye"></i> Edit</a>';
                $str.='<a href="'.url("provider/messages/message/".$message->id).'" class="btn badge btn-info btn-sm"><i class="fa fa-eye"></i> View</a>';
//                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/messages/delete').'\',\''.$message->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete message
     */
    public function destroyMessage($message_id)
    {
        $message = Message::findOrFail($message_id);
        $message->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Message deleted successfully']);
    }
}
