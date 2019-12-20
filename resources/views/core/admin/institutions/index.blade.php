@extends('layouts.admin')
@section('title','Our Institutions')
@section('content')
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","name","action"],
    'data_url'=>'admin/institutions/list',
    'base_tbl'=>'institutions'
    ])
    @endsection
