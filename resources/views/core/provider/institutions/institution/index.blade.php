@extends('layouts.admin')
@section('title',$institution->name)
@section('content')
        @include('common.auto_tabs',[
        'tabs_folder'=>'core.provider.institutions.institution.tabs',
        'tabs'=> ['institution','contacts',"images"],
        'base_url'=>'provider/institutions/institution/'.$institution->id
       ])

    @endsection
