@extends('layouts.admin')

@section('title','Referrals')

@section('content')

        @include('common.bootstrap_table_ajax',[
        'table_headers'=>["users.name"=>"name","id"=>"package","amount","created_at"=>"day_referred"],
        'data_url'=>'member/referrals/list',
        'base_tbl'=>'referrals',
        'search_table'=>'dont'
        ])

@endsection
