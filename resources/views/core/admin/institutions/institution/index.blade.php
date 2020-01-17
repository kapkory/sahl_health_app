@extends('layouts.admin')
@section('title',$institution->name)
@section('content')
    @include('common.auto_tabs',[
       'tabs_folder'=>'core.admin.institutions.institution.tabs',
       'tabs'=> ["details","services","contacts"],
       'base_url'=>'admin/institutions/institution/'.$institution->id
      ])
    @endsection
