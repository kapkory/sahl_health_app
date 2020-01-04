@extends('layouts.admin')
@section('content')
    @include('common.bootstrap_table_ajax',[
        'table_headers'=>["id","packages.name"=>"package","amount","reference","payment_mode","status","comment"],
        'data_url'=>'admin/payments/list',
        'base_tbl'=>'member_payments'
        ])

    @endsection
