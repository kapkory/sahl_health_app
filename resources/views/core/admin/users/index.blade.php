@extends('layouts.admin')

@section('title')
    Users
@endsection

@section('content')


    @include('common.auto_tabs',[
     'tabs_folder'=>'core.admin.users.tabs',
     'tabs'=> ['admins','members',"providers"],
     'base_url'=>'admin/users'
    ])


    @include('common.auto_modal',[
        'modal_id'=>'add_user',
        'modal_title'=>'Add User',
        'modal_content'=>Form::autoForm(['name','phone','email','role','form_model'=>\App\User::class],"admin/users")
    ])
    <script>
        getTabCounts("{{ url('admin/orders/count') }}");
    </script>
@endsection
