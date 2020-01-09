@extends('layouts.admin')

@section('title',Services)

@section('content')
<a href="#service_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD SERVICE</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id",,"action"],
    'data_url'=>'admin/settings/list',
    'base_tbl'=>'services'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'service_modal',
        'modal_title'=>'SERVICE FORM',
        'modal_content'=>Form::autoForm(\App\Models\Core\Service::class,"admin/settings")
    ])
@endsection
