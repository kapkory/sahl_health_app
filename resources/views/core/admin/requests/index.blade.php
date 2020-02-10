@extends('layouts.admin')

@section('title','Custom Package Requests')

@section('content')
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["name","job_title","company_name","employees","phone_number","email"],
    'data_url'=>'admin/requests/list',
    'base_tbl'=>'requests'
    ])

@endsection
