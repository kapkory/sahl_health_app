<a href="#message_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD MESSAGE</a>
@include('common.bootstrap_table_ajax',[
'table_headers'=>["id","message","action"],
'data_url'=>'provider/messages/list',
'base_tbl'=>'messages'
])

@include('common.auto_modal',[
    'modal_id'=>'message_modal',
    'modal_title'=>'MESSAGE FORM',
    'modal_content'=>Form::autoForm(['message','form_model'=>\App\Models\Core\Message::class],"provider/messages")
])
