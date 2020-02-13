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
        .bm-blue {
            border-bottom: 1px solid
            #1b75bb;
            margin-bottom: 15px;
        }
    </style>

@endsection
@section('content')
    <div class="row">
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
    </div>

    <div class="row" style="background-color: white">
        <div class="container-fluid">
            <div class="col-10 offset-1">
                <div class="pd-content">
                    <h2 class="p-2" style="text-transform: capitalize; color: #335062">About Us</h2>
                    <p class="border-bottom">
                        Sahl Health is a health innovation company that is consumer driven in it's product development and partnerships.
                        Through our understanding of various health barriers preventing individuals from living a healthier, happier, wealthier and longer lives,
                        we began a journey to strategically partner and innovate end to end digital platforms to transform millions of lives across the word one step at a time.
                    </p>

                    <h3 style="color: #335062">
                        Our Vision
                    </h3>
                    <p class="border-bottom">
                        To Transform Health Everyday, Everywhere.
                    </p>

                    <h3 style="color: #335062">
                        Our Core Values
                    </h3>

                    <h6 class="text-success sub-heading bm-blue p-2"> Integrity</h6>
                    <p>
                        Integrity drives our decisions each day. choosing to do what is right and communicatng openly and honestly
                    </p>

                    <h6 class="text-success sub-heading bm-blue p-2"> Inclusion</h6>
                    <p>
                        We value and embrace people with diverse backgrounds, life experiences, point of view ,talents and capabilites
                    </p>

                    <h6 class="text-success sub-heading bm-blue p-2"> Team Work</h6>
                    <p>
                        Our relatonship with each other is why we succeed.
                    </p>

                    <h6 class="text-success sub-heading bm-blue p-2"> Excellence</h6>
                    <p>
                        We are committed to excellence because our consumers can only have a healthier, wealthier, happier and longer lives when we are pursuing excellence everyday in whatever we do.
                    </p>

                    <h6 class="text-success sub-heading bm-blue p-2"> Innovation</h6>
                    <p>
                        Innovaton we care and transform lives through health partnerships and technology innovatons that educate, connect ,transform systems and people
                    </p>
                </div>
            </div>
        </div>
    </div>



@endsection
