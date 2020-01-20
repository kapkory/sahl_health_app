@extends('layouts.admin')

@section('title','Referrals')

@section('content')

    <a href="#refer_member" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> Refer Member</a>
        @include('common.bootstrap_table_ajax',[
        'table_headers'=>["users.name"=>"name","id"=>"package","amount","created_at"=>"day_referred"],
        'data_url'=>'agent/referrals/list',
        'base_tbl'=>'referrals'
        ])


        @include('common.auto_modal',[
        'modal_id'=>'refer_member',
        'modal_title'=>'Refer Member',
        'modal_content'=>Form::autoForm(["first_name","last_name",'phone_number','email',"form_model"=>\App\User::class],"agent/referrals")
        ])

@endsection
