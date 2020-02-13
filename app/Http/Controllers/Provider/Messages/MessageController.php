<?php

namespace App\Http\Controllers\Provider\Messages;

use App\Http\Controllers\Controller;
use App\Models\Core\Contact;
use App\Models\Core\ContactMessage;
use App\Models\Core\Institution;
use App\Models\Core\Message;
use App\Repositories\TechpitMessageRepository;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * return message's index view
     */
    public function index($message_id){
        $message = Message::where('user_id',auth()->id())
                ->whereId($message_id)
                ->first();
        $sent_messages = ContactMessage::where('message_id',$message_id)->count();
        $contacts = [];
        if ($sent_messages > 0){
            $contacts = ContactMessage::join('contacts','contacts.id','contact_messages.contact_id')
                ->select('contacts.name')->get();
        }
        return view($this->folder.'message',compact('message','sent_messages','contacts'));
    }

    public function sendMessages($message_id){
        $institution_id = auth()->user()->institution_id;
        $all_contacts = Contact::where('institution_id',$institution_id)->get();

        $contacts = [];
        foreach ($all_contacts as $contact){
            $contacts[] =  preg_replace('/^\\D*/', '', $contact->getFormattedPhone());
        }

        $message = Message::where('user_id',auth()->id())
            ->whereId($message_id)
            ->first();

        foreach ($all_contacts as $contact){
            $contmessage = new ContactMessage();
            $contmessage->message_id = $message_id;
            $contmessage->user_id = auth()->id();
            $contmessage->contact_id = $contact->id;
            $contmessage->save();
        }

        $techpitch = new TechpitMessageRepository();
        try{
            $response = $techpitch->execute($message->message,$contacts);
        }
        catch (\Exception $exception){
        }

     return redirect()->back()->with('notice',['type'=>'success','message'=>'User has already been notified']);
    }
}
