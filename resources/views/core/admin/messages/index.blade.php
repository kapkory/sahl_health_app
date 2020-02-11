@extends('layouts.admin')

@section('title','Messages')

@section('content')
<a href="#message_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD MESSAGE</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","message"],
    'data_url'=>'admin/messages/list',
    'base_tbl'=>'messages'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'message_modal',
        'modal_title'=>'MESSAGE FORM',
        'modal_content'=>Form::autoForm(['message','target','form_model'=>\App\Models\Core\Message::class],"admin/messages")
    ])
@endsection
