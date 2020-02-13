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
        #package_description{
            text-transform: capitalize;
        }
    </style>

@endsection
@section('content')
    <div class="row">
        <div class="container-fluid bg-dark-myimg pb-md-5 mb-md-5 px-0 mx-0" style="background: linear-gradient(0deg, #FFFFFF, #FFFFFF), linear-gradient(0deg, #F5F5F5, #F5F5F5), #FFFFFF;">
            <div class="col-md-10 mx-auto">
                <div class="container py-md-5">
                    <div class="rounded">
                        <div class="row py-4">
                            <div class="col-md-8 pt-md-3 mt-md-3">
                                <h3 style="font-weight: 600; color: white"; id="package_description">Your health and wellness comes first.</h3>
                            </div>

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
                        <li class="nav-item col-md-3 col-sm-12">
                            <a class="nav-link active" data-toggle="pill" href="#individual_plan">Our Story</a>
                        </li>
                        <li class="nav-item col-md-3 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#group_3">Vision, Mission & Values</a>
                        </li>
                        <li class="nav-item col-md-3 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#group_4">Working Hours</a>
                        </li>

                        <li class="nav-item col-md-3 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#group_4">Contacts</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 mt-3 mx-auto pb-5" style="background: #FFFFFF">
                    <div class="tab-content">
                        <div id="individual_plan" class="tab-pane fade show active">
                            <div class="col-12 ">
                                <div class="row" style="background-color: white">
                                    <div class="container-fluid">
                                        <div class="col-md-10 offset-md-1 col-sm-12">
                                            <div class="row">
                                                <h2 class="p-2" style="text-transform: capitalize">Welcome to the Sahl Individual<br> Health Plan</h2>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida convallis erat quis sagittis. In placerat fringilla leo, vel varius mauris tempus vel. Morbi vel ligula egestas, pellentesque mi vel, lobortis velit. Etiam ut turpis sapien. Mauris ornare nisl ac nisi cursus, et ornare mauris viverra. Aenean pretium, lectus sit amet pellentesque convallis, sapien sapien efficitur mi, ultricies ultricies massa nunc nec felis. Mauris malesuada ultricies ultricies. Nunc ornare justo non hendrerit tristique. Praesent turpis ex, tincidunt in gravida in,<br> <br>
                                                </p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6 col-xs-6 my-2" >
                                                    <div class="card" style="background:#F5F5F5;border-radius: 8%">
                                                        <img style="object-fit: cover; height: 240px" src="{{ url('sahl/assets/image/corporate/1.svg') }}">
                                                        <h4 class="text-center  pt-2" style="height: 60px">Preventive Care</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-6 my-2" >
                                                    <div class="card" style="background:#F5F5F5;border-radius: 8%">
                                                        <img style="object-fit: cover; height: 240px" src="{{ url('sahl/assets/image/corporate/2.svg') }}">
                                                        <h4 class="text-center  pt-2"style="height: 60px">Basic Pre-employment Checks</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-6 my-2" >
                                                    <div class="card" style="background:#F5F5F5;border-radius: 8%">
                                                        <img style="object-fit: cover; height: 240px" src="{{ url('sahl/assets/image/corporate/3.svg') }}">
                                                        <h4 class="text-center pt-2" style="height: 60px"> Comprehensive Pre-employment Checks</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-6 my-2" >
                                                    <div class="card" style="background:#F5F5F5;border-radius: 8%">
                                                        <img style="object-fit: cover; height: 240px" src="{{ url('sahl/assets/image/corporate/4.svg') }}">
                                                        <h4 class="text-center  pt-2" style="height: 60px">Annual Basic Screening</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-6 my-2" >
                                                    <div class="card" style="background:#F5F5F5;border-radius: 8%">
                                                        <img style="object-fit: cover; height: 240px" src="{{ url('sahl/assets/image/corporate/5.svg') }}">
                                                        <h4 class="text-center  pt-2"style="height: 60px">Annual Comprehensive Screening</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-6 my-2" >
                                                    <div class="card" style="background:#F5F5F5;border-radius: 8%">
                                                        <img style="object-fit: cover; height: 240px" src="{{ url('sahl/assets/image/corporate/6.svg') }}">
                                                        <h4 class="text-center pt-2" style="height: 60px"> Maternal care</h4>
                                                    </div>
                                                </div>



                                                <div class="col-md-4 col-sm-6 col-xs-6 my-2" >
                                                    <div class="card" style="background:#F5F5F5;border-radius: 8%">
                                                        <img style="object-fit: cover; height: 240px" src="{{ url('sahl/assets/image/corporate/4.svg') }}">
                                                        <h4 class="text-center  pt-2" style="height: 60px">Gym Membership</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-6 my-2" >
                                                    <div class="card" style="background:#F5F5F5;border-radius: 8%">
                                                        <img style="object-fit: cover; height: 240px" src="{{ url('sahl/assets/image/corporate/5.svg') }}">
                                                        <h4 class="text-center  pt-2"style="height: 60px">Nutrition Support</h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-6 col-xs-6 my-2" >
                                                    <div class="card" style="background:#F5F5F5;border-radius: 8%">
                                                        <img style="object-fit: cover; height: 240px" src="{{ url('sahl/assets/image/corporate/6.svg') }}">
                                                        <h4 class="text-center pt-2" style="height: 60px"> Health Awareness Workshops </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <div id="group_3" class="tab-pane">
                            <div class="col-10 offset-1">
                                <div class="pd-content">
                                    <h2 class="p-2" style="text-transform: capitalize; color: #335062">Welcome to the Sahl Individual<br> Health Plan</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida convallis erat quis sagittis. In placerat fringilla leo, vel varius mauris tempus vel. Morbi vel ligula egestas, pellentesque mi vel, lobortis velit. Etiam ut turpis sapien. Mauris ornare nisl ac nisi cursus, et ornare mauris viverra. Aenean pretium, lectus sit amet pellentesque convallis, sapien sapien efficitur mi, ultricies ultricies massa nunc nec felis. Mauris malesuada ultricies ultricies. Nunc ornare justo non hendrerit tristique. Praesent turpis ex, tincidunt in gravida in,<br> <br>
                                        venenatis ut neque. Vivamus ultrices, metus feugiat efficitur tempor, arcu ex iaculis augue, vitae malesuada lorem tortor in massa. Donec gue diam. Vestibulum bibendum, nulla vel semper rutrum, libero lacus tristique lectus, in placerat libero orci at magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida convallis erat quis sagittis. In placerat
                                    </p>

                                    <h3 style="color: #335062">Features</h3>
                                    <p>
                                        fringilla leo, vel varius mauris tempus vel. Morbi vel ligula egestas, pellentesque mi vel, lobortis velit. Etiam ut turpis sapien. Mauris ornare nisl ac nisi cursus, et ornare mauris viverra. Aenean pretium, lectus sit am
                                    </p>

                                    <ul style="list-style-type: decimal">
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="group_4" class="tab-pane">
                            <div class="col-10 offset-1">
                                <div class="pd-content">
                                    <h2 class="p-2" style="text-transform: capitalize; color: #335062">Welcome to the Sahl Individual<br> Health Plan</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida convallis erat quis sagittis. In placerat fringilla leo, vel varius mauris tempus vel. Morbi vel ligula egestas, pellentesque mi vel, lobortis velit. Etiam ut turpis sapien. Mauris ornare nisl ac nisi cursus, et ornare mauris viverra. Aenean pretium, lectus sit amet pellentesque convallis, sapien sapien efficitur mi, ultricies ultricies massa nunc nec felis. Mauris malesuada ultricies ultricies. Nunc ornare justo non hendrerit tristique. Praesent turpis ex, tincidunt in gravida in,<br> <br>
                                        venenatis ut neque. Vivamus ultrices, metus feugiat efficitur tempor, arcu ex iaculis augue, vitae malesuada lorem tortor in massa. Donec gue diam. Vestibulum bibendum, nulla vel semper rutrum, libero lacus tristique lectus, in placerat libero orci at magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida convallis erat quis sagittis. In placerat
                                    </p>

                                    <h3 style="color: #335062">Features</h3>
                                    <p>
                                        fringilla leo, vel varius mauris tempus vel. Morbi vel ligula egestas, pellentesque mi vel, lobortis velit. Etiam ut turpis sapien. Mauris ornare nisl ac nisi cursus, et ornare mauris viverra. Aenean pretium, lectus sit am
                                    </p>

                                    <ul style="list-style-type: decimal">
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                        <li> Lorem ipsum dolor sit amet</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>






@endsection
