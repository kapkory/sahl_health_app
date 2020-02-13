@extends('layouts.admin')

@section('title','UserMessages')

@section('content')
<a href="#usermessage_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD USERMESSAGE</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","user_id","message_id","integer","action"],
    'data_url'=>'admin/messages/users/list',
    'base_tbl'=>'usermessages'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'usermessage_modal',
        'modal_title'=>'USERMESSAGE FORM',
        'modal_content'=>Form::autoForm(\App\Models\Core\UserMessage::class,"admin/messages/users")
    ])
@endsection
