@extends('layouts.admin')

@section('title',DependantPackages)

@section('content')
<a href="#dependantpackage_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD DEPENDANTPACKAGE</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id",,"action"],
    'data_url'=>'admin/members/dependants/packages/list',
    'base_tbl'=>'dependantpackages'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'dependantpackage_modal',
        'modal_title'=>'DEPENDANTPACKAGE FORM',
        'modal_content'=>Form::autoForm(\App\Models\Core\DependantPackage::class,"admin/members/dependants/packages")
    ])
@endsection
