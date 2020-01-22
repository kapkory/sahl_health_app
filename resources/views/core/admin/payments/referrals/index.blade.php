@extends('layouts.admin')

@section('title','Referrals')

@section('content')
    @include('common.auto_tabs',[
         'tabs_folder'=>'core.admin.payments.referrals.tabs',
         'tabs'=> ['inactive','unpaid',"paid"],
         'base_url'=>'admin/payments/referrals'
        ])


@endsection
