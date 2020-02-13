@extends('layouts.admin')

@section('title','Messages')

@section('content')
    @include('common.auto_tabs',[
            'tabs_folder'=>'core.provider.messages.tabs',
            'tabs'=> ['contacts','messages'],
            'base_url'=>'provider/messages/'
           ])
@endsection
