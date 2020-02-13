@extends('layouts.admin')
@section('title',$institution->name)
@section('content')

    @push('scripts')
        <!-- Load Styles -->
        <link rel="stylesheet" href="{{ url('drift/assets/css') }}/dropzone.min.css">

        <script src="{{ url('drift/assets/js/dropzone.min.js') }}"></script>
        @endpush
        @include('common.auto_tabs',[
        'tabs_folder'=>'core.provider.institutions.institution.tabs',
        'tabs'=> ['institution','services','contacts',"images","upload_images"],
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


