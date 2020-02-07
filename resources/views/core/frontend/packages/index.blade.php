@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/about.jpg') }}") !important;
        }

        @media screen and (max-width: 767px) {
            .mb_about {
                margin-top: 10px !important;
            }
        }
        @media screen and (min-width: 768px) {
            .mb_about {
                margin-top: -110px !important;
            }
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

            <div class="mb_about container py-md-3 bg-light shadow-lg">
                <div class="col-12 mx-auto">
                    <ul class="nav nav-tabs row">
                        <li class="nav-item col-md-4 col-sm-12">
                            <a class="nav-link active" data-toggle="pill" href="#individual_plan">Individual Plan</a>
                        </li>
                        <li class="nav-item col-md-4 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#group_3">Group Plan for 3</a>
                        </li>
                        <li class="nav-item col-md-4 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#group_4">Group Plan for 4</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 mt-3 mx-auto" style="background: linear-gradient(0deg, #FFFFFF, #FFFFFF), linear-gradient(0deg, #F5F5F5, #F5F5F5), #FFFFFF;">
                    <div class="tab-content">
                        <div id="individual_plan" class="tab-pane fade show active">
                            <h3 class="p-2 pt-3" style="text-transform: capitalize">
                                Your health and wellness comes first
                            </h3>
{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida convallis erat quis sagittis. In placerat fringilla leo, vel varius mauris tempus vel. Morbi vel ligula egestas, pellentesque mi vel, lobortis velit. Etiam ut turpis sapien. Mauris ornare nisl ac nisi cursus, et ornare mauris viverra. Aenean pretium, lectus sit amet pellentesque convallis, sapien sapien efficitur mi, ultricies ultricies massa nunc nec felis. Mauris malesuada ultricies ultricies. Nunc ornare justo non hendrerit tristique. Praesent turpis ex, tincidunt in gravida in,<br> <br>--}}
{{--                                venenatis ut neque. Vivamus ultrices, metus feugiat efficitur tempor, arcu ex iaculis augue, vitae malesuada lorem tortor in massa. Donec gue diam. Vestibulum bibendum, nulla vel semper rutrum, libero lacus tristique lectus, in placerat libero orci at magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida convallis erat quis sagittis. In placerat--}}
{{--                            </p>--}}
                        </div>

                        <div id="group_3" class="tab-pane">
                            <h3>The people you care for the most deserve the best care</h3>
{{--                            <p>--}}
{{--                                pis sapien. Mauris ornare nisl ac nisi cursus, et ornare mauris viverra. Aenean pretium, lectus sit am--}}
{{--                            </p>--}}
                        </div>

                        <div id="group_4" class="tab-pane">
                            <h3>The more people you care about, the easier we make it to care for them.</h3>
{{--                            <p>--}}
{{--                                fringilla leo, vel varius mauris tempus vel. Morbi vel ligula egestas, pellentesque mi vel, lobortis velit. Etiam ut turpis sapien. Mauris ornare nisl ac nisi cursus, et ornare mauris viverra. Aenean pretium, lectus sit am--}}
{{--                            </p>--}}
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>



@endsection
