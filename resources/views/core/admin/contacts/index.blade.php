@extends('layouts.admin')

@section('title','Contact uses')

@section('content')
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","name","email","phone","location","message","action"],
    'data_url'=>'admin/contacts/list',
    'base_tbl'=>'contact_us'
    ])

@endsection
