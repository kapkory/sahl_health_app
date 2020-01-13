@extends('layouts.admin')

@section('title','Visits')

@section('content')
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["user_id"=>'customer',"created_at"=>"visited_on","action"],
    'data_url'=>'member/visits/list',
    'base_tbl'=>'visits'
    ])
@endsection
