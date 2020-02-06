@extends('layouts.admin')

@section('title','Referrals')

@section('content')
    <style>
        .dt-content {
            padding: 1.4rem 3.2rem;
        }
        .dt-page__header {
            margin-bottom: 0.4rem;
        }
    </style>
    <div class="jumbotron p-3 " style="width: 25%">
        <div class="media">
            <i class="icon icon-orders-new icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
            <div class="media-body">
                <p class="mb-1 h1">Ksh <br>{{ @number_format($data['referral_amount'],2) }}</p>
                <span class="d-block text-black-50">Earnings</span>
            </div><!-- /media body -->
        </div><!-- /media -->
    </div>
{{--    <div class="col-md-3 col-6"><!-- Card -->--}}
        <div class="dt-card" style="background: rgba(196, 196, 196, 0.42);border-radius: 10px;"><!-- Card Body -->
{{--            <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >--}}


{{--            </div><!-- /card body -->--}}
        </div><!-- /card -->
{{--    </div>--}}
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
