@extends('layouts.admin')

@section('title',Referrals)

@section('content')
<a href="#referral_modal" class="btn btn-info btn-sm clear-form float-right" data-toggle="modal"><i class="fa fa-plus"></i> ADD REFERRAL</a>
    @include('common.bootstrap_table_ajax',[
    'table_headers'=>["id","user_id","referral_id","amount","status","action"],
    'data_url'=>'provider/referrals/list',
    'base_tbl'=>'referrals'
    ])

    @include('common.auto_modal',[
        'modal_id'=>'referral_modal',
        'modal_title'=>'REFERRAL FORM',
        'modal_content'=>Form::autoForm(\App\Models\Core\Referral::class,"provider/referrals")
    ])
@endsection
