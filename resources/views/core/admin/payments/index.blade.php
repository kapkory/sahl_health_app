@extends('layouts.admin')
@section('content')
    <a href="#add_payment" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> Add Payment</a>

    @include('common.bootstrap_table_ajax',[
        'table_headers'=>["id","packages.name"=>"package","amount","reference","payment_mode","status","comment"],
        'data_url'=>'admin/payments/list',
        'base_tbl'=>'member_payments'
        ])

    @include('common.auto_modal',[
    'modal_id'=>'add_payment',
    'modal_title'=>'Add Payment',
    'modal_content'=>Form::autoForm(['member','package','amount','reference','payment_mode','comment','form_model'=>\App\Models\Core\MemberPayment::class],"admin/payments")
])

    <script>
        autoFillSelect('package','{{ url('admin/packages/list?get') }}');
    </script>
    @endsection
