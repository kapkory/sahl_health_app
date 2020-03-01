@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/pages/about.jpg') }}") !important;
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

    <div class="col-md-10 mx-auto">
        <div class="container mb-0">

            <div class="mb_about container py-md-3 bg-light shadow-lg">
                <div class="col-12 mx-auto">
                    <ul class="nav nav-tabs row">
                        <li class="nav-item col-md-4 col-sm-12">
                            <a class="nav-link active" data-toggle="pill" href="#home">Our Story</a>
                        </li>
                        <li class="nav-item col-md-4 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#menu1">Vision, Mission & Values</a>
                        </li>
                        <li class="nav-item col-md-4 col-sm-12">
                            <a class="nav-link" data-toggle="pill" href="#contacts">Contacts</a>
                        </li>
                    </ul>
{{--                    <h5 class="text-center">--}}
{{--                        <div id="c_registration_text" v-if="package_cost > 0">--}}
{{--                            The package Costs Ksh<span class="text-success"> @{{ package_cost }}</span>--}}
{{--                        </div>--}}
{{--                    </h5>--}}

                </div>
                <div class="col-12 mt-3 mx-auto" style="background: linear-gradient(0deg, #FFFFFF, #FFFFFF), linear-gradient(0deg, #F5F5F5, #F5F5F5), #FFFFFF;">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade show active py-3">
                            <p class="pt-3">
                                Sahl Health is a health innovation company that is consumer-driven in it's product development and partnerships. Through our understanding of various health barriers preventing individuals from living healthier, happier, wealthier and longer lives, we began a journey to strategically partner and innovate end-to-end digital platforms, to transform millions of lives across the word one step at a time.
                            </p>
                            <div class="row">
                                <div class="col-md-6 offset-1">
                                    <img height="300" src="{{ url('sahl/assets/image/pages/ceo.jpg') }}" alt="Sahl About Us">
                                </div>
                                <div class="col-md-4 pt-3">
                                     <h4 class="pt-3">
                                         “We have healthcare and wellness plans for everyone”
                                     </h4><br>
                                    <h5>
                                        Sahl Health CEO <br>Mr. Eric Peti
                                    </h5>
                                </div>
                            </div>
                            <p>
                                We have healthcare and wellness plans for individuals, families, chamas, SMEs and corporates. Become a Sahl Member or Partner today and save almost a quarter of your medical bills every year.
                            </p>
                        </div>

                        <div id="menu1" class="tab-pane px-md-5">
                            <h3 style="color: #335062" class="pt-5">
                                Our Vision
                            </h3>
                            <p class="border-bottom">
                                To Transform Health Everyday, Everywhere.
                            </p>

                            <h3 style="color: #335062">
                               <u> Our Core Values</u>
                            </h3>

                            <h4 class="text-success sub-heading bm-blue p-2"> Integrity</h4>
                            <p>
                                Integrity drives our decisions each day. choosing to do what is right and communicatng openly and honestly
                            </p>

                            <h4 class="text-success sub-heading bm-blue p-2"> Inclusion</h4>
                            <p>
                                We value and embrace people with diverse backgrounds, life experiences, point of view ,talents and capabilites
                            </p>

                            <h4 class="text-success sub-heading bm-blue p-2"> Team Work</h4>
                            <p>
                                Our relationship with each other is why we succeed.
                            </p>

                            <h4 class="text-success sub-heading bm-blue p-2"> Excellence</h4>
                            <p>
                                We are committed to excellence because our consumers can only have a healthier, wealthier, happier and longer lives when we are pursuing excellence everyday in whatever we do.
                            </p>

                            <h4 class="text-success sub-heading bm-blue p-2"> Innovation</h4>
                            <p>
                                Innovation we care and transform lives through health partnerships and technology innovatons that educate, connect ,transform systems and people
                            </p>
                        </div>


                        <div id="contacts" class="tab-pane pl-md-5">
                            <div class="row mt-5 mb-5">
                                <div class=" col-xs-12 col-md-6 col-sm-12 pl-0">
                                    <div class="card-body contact h-100 jumbotron p-3 ">

                                        <h5 class="my-1 border-bottom font-weight-bold">GET IN TOUCH</h5>
                                        <p class="p-2 h5">
                                            Reach us for any inquiries on Health
                                        </p>
                                        <p  class="p-2">
                                            Address: Sahl Health Limited, Pine Tree Plaza <br><br>
                                            P.O. Box 103-00202, Nairobi, Kenya. <br><br>
                                            Working Hours: 0800 - 1700 HRS <br>
                                            Mobile: +254 769 687 287 / +254 731 434 140 <br><br>
                                            Email: support@sahlhealth.com <br>
                                            Web: www.sahlhealth.com
                                        </p>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-sm-12 " >
                                    <div class="mapouter pt-1">
                                        <div class="gmap_canvas">
                                            <iframe style="width: 100% !important;"  height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=Sahl%20Health&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                        </div>
                                        <style>.mapouter{position:relative;text-align:right;height:400px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:100%;}</style>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>



@endsection
