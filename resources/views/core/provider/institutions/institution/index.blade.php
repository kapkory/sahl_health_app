@extends('layouts.admin')
@section('title',$institution->name)
@section('content')
{{--    ,'services','contacts'--}}
        @include('common.auto_tabs',[
        'tabs_folder'=>'core.provider.institutions.institution.tabs',
        'tabs'=> ['institution','services'],
        'base_url'=>'provider/institutions/institution/'.$institution->id
       ])
        @push('footer-scripts')
            <script>
                $(function () {
                    autoFillSelect('services','{{ url("api/services/".$institution->id) }}');
                })
            </script>
        @endpush
    @endsection


