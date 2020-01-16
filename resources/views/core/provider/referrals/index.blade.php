@extends('layouts.admin')

@section('title','Referrals')

@section('content')
    @if(auth()->user()->referral_code)
    <a href="#refer_member" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> Refer Member</a>
        @include('common.bootstrap_table_ajax',[
        'table_headers'=>["users.name"=>"name","id"=>"package","amount","created_at"=>"day_referred"],
        'data_url'=>'provider/referrals/list',
        'base_tbl'=>'referrals'
        ])
    @else
        <div class="alert alert-info">
            <p style="font-size: 16px">
                Earn by referring new users, after a member pays you will get a commission on the payment.

            </p>
            <a href="#" class="btn btn-outline-info" style="background-color: orangered; border-color: orangered; color: white" onclick="runPlainRequest('{{ url('provider/referrals/register-as-agent') }}')">Become an Agent</a>
        </div>

@endif

@include('common.auto_modal',[
'modal_id'=>'refer_member',
'modal_title'=>'Refer Member',
'modal_content'=>Form::autoForm(["first_name","last_name",'phone_number','email',"form_model"=>\App\User::class],"provider/referrals")
])

@endsection
