@extends('layouts.admin')

@section('title','DependantPayments')

@section('content')
<a href="#dependantpayment_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD DEPENDANTPAYMENT</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","dependant_ids","amount","member_id","status","reference","mode","comments","payer_id","action"],
    'data_url'=>'member/dependants/payments/list',
    'base_tbl'=>'dependant_payments'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'dependantpayment_modal',
        'modal_title'=>'DEPENDANT PAYMENT FORM',
        'modal_content'=>Form::autoForm(\App\Models\Core\DependantPayment::class,"member/dependants/payments")
    ])
@endsection
