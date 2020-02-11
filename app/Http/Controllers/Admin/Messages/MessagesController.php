<?php

namespace App\Http\Controllers\Admin\Messages;

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
        request()->validate($this->getValidationFields(['message','target']));
        $data = \request()->all();


        $users = User::where('role','client')->get();
        if (\request('target') == 'providers'){
            $users = User::where('role','provider')->get();
        }


        $contacts = [];
        foreach ($users as $user){
            $contacts[] =  preg_replace('/^\\D*/', '', $user->getFormattedPhone());
        }

        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('messages', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        unset($data['target']);
        $message = $this->autoSaveModel($data);

        foreach ($users as $user){
            $usermessage = new UserMessage();
            $usermessage->user_id = $user->id;
            $usermessage->message_id = $message->id;
            $usermessage->save();
        }

        $techpitch = new TechpitMessageRepository();
        try{
            $response = $techpitch->execute(\request('message'),$contacts);
        }
        catch (\Exception $exception){
        }

        return redirect()->back()->with('notice',['type'=>'success','message'=>'User messages has been sent']);
    }

    /**
     * return message values
     */
    public function listMessages(){
        $messages = Message::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $messages->get();
        return SearchRepo::of($messages)
            ->addColumn('action',function($message){
                $str = '';
                $json = json_encode($message);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'message_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/messages/delete').'\',\''.$message->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
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
