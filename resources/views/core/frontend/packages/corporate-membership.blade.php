@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/package.png') }}") !important;
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
                        <li class="nav-item col-sm-12">
                            <a class="nav-link active" data-toggle="pill" href="#individual_plan">Corporate Membership Program</a>
                        </li>

                    </ul>
                </div>
                <div class="col-12 mt-3 mx-auto pb-5" style="background: #FFFFFF">
                    <div class="tab-content">
                        <div id="individual_plan" class="tab-pane fade show active">
                            <div class="col-10 offset-1">
                                <div class="pd-content">
                                    <h4 class="p-2 pt-4" style="text-transform: capitalize; color: #335062">Are you a regular at hospitals and wellness places? </h4>
                                    <p>
                                        The best healthcare costs an arm and a leg, but you never have to get to that point. A Sahl Individual Plan means more health and happiness for you, at only Kshs. 2499 a year. We have made it easy and affordable to take care of your health and wellness everyday as a way of life.
                                    </p>

                                    <h4 style="color: #335062">This plan is for you</h4>
                                    <p>
                                        You never know when illness will come calling. If you have health insurance, you also never know when your bills will exceed your insurance limit. The Sahl Individual Plan is for everyone, young or old, insured or not insured, healthy or living with a chronic condition.
                                    </p>
                                    <h4 class="p-2 pt-4" style="text-transform: capitalize; color: #335062">Key Benefits</h4>
                                    <ul style="list-style-type: decimal">
                                        <li> Save up to 20% on medical bills</li>
                                        <li> Save up to 10% on wellness programs</li>
                                        <li> Save up to 15 % on health insurance premium</li>
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
