@extends('layouts.admin')

@section('title',Visits)

@section('content')
<a href="#visit_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD VISIT</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","institution_id","user_id","dependant_id","status","action"],
    'data_url'=>'admin/visits/list',
    'base_tbl'=>'visits'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'visit_modal',
        'modal_title'=>'VISIT FORM',
        'modal_content'=>Form::autoForm(\App\Models\Core\Visit::class,"admin/visits")
    ])
@endsection
