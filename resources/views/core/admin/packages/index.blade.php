@extends('layouts.admin')

@section('title','Packages')

@section('content')

    @include('common.auto_tabs',[
        'tabs_folder'=>'core.admin.packages.tabs',
        'tabs'=> ['categories','packages'],
        'base_url'=>'admin/packages'
       ])
@endsection
