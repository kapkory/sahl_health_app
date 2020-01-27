@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/hospital-background.svg') }}");
        }
    </style>

@endsection
@section('content')
    <div class="container-fluid bg-dark-myimg pb-md-5 mb-md-5 ">
        <div class="col-md-10 mx-auto">
            <div class="container py-md-5">
                <div class="rounded">
                    <div class="row py-4">
                        <div class="col-md-8 pt-md-3 mt-md-3">
                            <h3 class="text-light">
                                <b>Headline Here </b>
                            </h3>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 mx-auto">
        <div class="container mb-0">

            <div style="margin-top: -110px !important;" class="container py-md-3 bg-light shadow-lg">
                <div class="col-12 mx-auto">
                    <ul class="nav nav-tabs row">
                        <li class="nav-item col-md-3 col-sm-12">
                            <a class="nav-link active" data-toggle="pill" href="#home">Overview</a>
                        </li>
                        <li class="nav-item col-md-3 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#menu1">Features</a>
                        </li>
                        <li class="nav-item col-md-3 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#menu1">Benefits</a>
                        </li>
                        <li class="nav-item col-md-3 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#menu1">How To Start</a>
                        </li>
                    </ul>
{{--                    <h5 class="text-center">--}}
{{--                        <div id="c_registration_text" v-if="package_cost > 0">--}}
{{--                            The package Costs Ksh<span class="text-success"> @{{ package_cost }}</span>--}}
{{--                        </div>--}}
{{--                    </h5>--}}

                </div>
                <div class="col-12 mt-3 mx-auto">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade show active">
                            <h2 class="p-2" style="text-transform: capitalize">Welcome to the Sahl Individual Health Plan</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>

                        <div id="menu1" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>



@endsection
