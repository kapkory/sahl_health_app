@extends('layouts.admin')

@section('title','Institution Levels')

@section('content')

    @include('common.auto_tabs',[
     'tabs_folder'=>'core.admin.settings.tabs',
     'tabs'=> ["institution_level","organization_type","identification","services"],
     'base_url'=>'admin/settings'
    ])
@endsection
