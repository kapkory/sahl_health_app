@extends('layouts.admin')
@section('title','Our Institutions')
@section('content')
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","name","institution_levels.name"=>"category","organization_types.name"=>"organization_type","discount","action"],
    'data_url'=>'provider/institutions/list',
    'base_tbl'=>'institutions'
    ])
    @endsection
