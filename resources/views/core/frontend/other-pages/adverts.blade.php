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

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="background-color: white">
        <div class="container-fluid">
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



@endsection
