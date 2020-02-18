@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')

    <a href="#add_user" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> Add User</a>

    @include('common.auto_tabs',[
     'tabs_folder'=>'core.admin.users.tabs',
     'tabs'=> ['admins','members',"providers"],
     'base_url'=>'admin/users'
    ])


    @include('common.auto_modal',[
        'modal_id'=>'add_user',
        'modal_title'=>'Add User',
        'modal_content'=>Form::autoForm(['name','phone_number','email','role','password','form_model'=>\App\User::class],"admin/users/user")
    ])

@endsection
