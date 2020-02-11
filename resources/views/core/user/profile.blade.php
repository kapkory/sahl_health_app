@extends('layouts.admin')
@section('title')
    My Profile
@endsection
@section('content')
    <div class="col-md-8">
        <div class="section">
            <h3 class="heading">Background Info<a href="#details_modal_2" data-toggle="modal" class="btn btn-xs btn-raised btn-info pull-right">Edit</a> </h3>
            <table class="table table-bordered table-condensed">
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Identification</th>
                    <td>{{ @$user->profile->identificationType->name }}</td>
                </tr>
                <tr>
                    <th>Identification Number</th>
                    <td>{{ @$user->profile->identification_number }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $user->phone_number }}</td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>********
                        <a href="#update_password" data-toggle="modal" class="btn btn-xs btn-raised btn-info pull-right">Edit</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @include('common.auto_modal',[
        'modal_id'=>'details_modal_2',
        'modal_title'=>'Personal Details',
        'modal_content'=>Form::autoForm(['name','email','identification_type','identification_number'],'user/profile',null,Auth::user()),
    ])

    @include('common.auto_modal',[
        'modal_id'=>'update_password',
        'modal_title'=>'New Password',
        'modal_content'=>Form::autoForm(['password','password_confirmation'],'user/password'),
    ])

    <script>
        $(function () {
            autoFillSelect('identification_type','{{ url("api/institution/identification_type") }}')
        });
        $('select[name="identification_type"]').val("{{ @$user->profile->identificationType->id }}");
        $('input[name="identification_number"]').val("{{ @$user->profile->identification_number }}");
    </script>
@endsection
