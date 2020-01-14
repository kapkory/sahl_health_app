@extends('layouts.admin')

@section('title','Institution Visits')

@section('content')
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["user_id"=>'customer',"institutions.name"=>"institution","amount","created_at"=>"visited_on","action"],
    'data_url'=>'admin/visits/list',
    'base_tbl'=>'visits'
    ])

@endsection
