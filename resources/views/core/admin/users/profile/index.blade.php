@extends('layouts.admin')

@section('title',Profiles)

@section('content')
<a href="#profile_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD PROFILE</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","user_id","date_of_birth","bio","timezone","identification_type_id","identification_number","website","action"],
    'data_url'=>'admin/users/list',
    'base_tbl'=>'profiles'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'profile_modal',
        'modal_title'=>'PROFILE FORM',
        'modal_content'=>Form::autoForm(\App\Models\Core\Profile::class,"admin/users")
    ])
@endsection
