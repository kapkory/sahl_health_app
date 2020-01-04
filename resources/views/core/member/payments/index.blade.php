@extends('layouts.admin')

@section('title',MemberPayments)

@section('content')
<a href="#memberpayment_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD MEMBERPAYMENT</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","member_id","package_id","amount","reference","payment_mode","status","comment","payer_id","action"],
    'data_url'=>'member/payments/list',
    'base_tbl'=>'memberpayments'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'memberpayment_modal',
        'modal_title'=>'MEMBERPAYMENT FORM',
        'modal_content'=>Form::autoForm(\App\Models\Core\MemberPayment::class,"member/payments")
    ])
@endsection
