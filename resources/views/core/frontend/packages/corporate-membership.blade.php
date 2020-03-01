@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/corporate.jpg') }}") !important;
            object-fit: cover;
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
{{--                                <h3 style="font-weight: 600; color: white"; id="package_description">Your health and wellness comes first.</h3>--}}
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
                                <div class="text-center" style="padding-top: 50px">
                                    <h3>
                                        Smarter Together + Reduced Cost
                                    </h3>
                                    <p>
                                        Reduce overall claim spending on health with Sahl Health Corporate Plan
                                    </p>
                                    <a href="{{ url('#') }}" class="btn package_button" >Get Started</a>
                                </div>
                                <div class="pd-content">
                                    <h5 class="text-uppercase pt-4">
                                        CORPORATE COMPANIES COUNT ON US TO HELP REDUCE CLAIMS FROM MEDICAL BILLS
                                    </h5>
                                    <p>
                                        Our network of health providers of more than 500 in Kenya are delighted to help companies reduce claim on their medical bills by offering up to 15 percent discount thus improving their overall bottom line.
                                    </p>
                                    <img src="{{ url('frontend/assets/images/services.png') }}" style="width: 100%" alt="Our Services">

                                    <h3 style="text-decoration:underline">
                                        Corporate Wellness Program
                                    </h3>
                                    <div class="text-center">
                                        <h2>
                                            HEALTHY EMPLOYEES<br>
                                            REALIZE HEALTHY SAVINGS
                                        </h2>
                                        <p>
                                            Sahl Health is your dedicated partner to create a corporate wellness program that will inspire your employees to make simple and positive changes to improve their health. Our programs prevent at-risk employees from becoming ill and help chronically ill employees stabilize their conditions in addition to lifestyle programs
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-xs-12">
                                                    <div class="text-center my-5 ">
                                                        <h4 class="section-heading-title" style="color: #335062; font-weight: bolder">
                                                            Our wellness mantra is: Prevent More, Save More.
                                                        </h4>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-sm-11" style="border-style: none;background: linear-gradient(358.96deg, rgba(3, 3, 3, 0.97) 0.63%, rgba(255, 255, 255, 0) 98.25%);">
                                                    <img class="lazy" src="{{ url('sahl') }}/assets/image/inpatient.svg" alt="Save More at Sahl Health" style="height: 250px;object-fit: cover; border-radius: 0px; max-width: 100%" >
                                                    <div class="post-imgoverlay-content">
                                                        <h4 class="post-title">
                                                            <a href="{{ url('corporate-membership') }}#biometic" class="title text-center">Biometric<br> Screenings </a>
                                                        </h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-11" style="border-style: none;background: linear-gradient(358.96deg, rgba(3, 3, 3, 0.97) 0.63%, rgba(255, 255, 255, 0) 98.25%);">
                                                    <img class="lazy" src="{{ url('sahl') }}/assets/image/outpatient.svg" alt="Save More at Sahl Health" style="height: 250px; max-width: 100%; object-fit: cover; border-radius: 0px" >
                                                    <div class="post-imgoverlay-content">
                                                        <h4 class="post-title">
                                                            <a href="{{ url('corporate-membership') }}#education" class="title">Health Education <br> Wellness Program </a>
                                                        </h4>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-11" style="border-style: none;background: linear-gradient(358.96deg, rgba(3, 3, 3, 0.97) 0.63%, rgba(255, 255, 255, 0) 98.25%);">
                                                    <img class="lazy" src="{{ url('sahl') }}/assets/image/save-more.svg" alt="Save More at Sahl Health" style="height: 250px;max-width: 100%;object-fit: cover; border-radius: 0px" >
                                                    <div class="post-imgoverlay-content">
                                                        <h4 class="post-title">
                                                            <a href="{{ url('corporate-membership') }}#assessment" class="title">Health Assessment <br>Program</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid mt-2 mb-3">
                                                <div class="text-center">
                                                    <a href="{{ url('#') }}" class="btn package_button" >View All</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="biometric">
                                        <h4 style="font-weight: bolder">
                                            Biometric Screenings
                                        </h4>
                                        <p>
                                            On-site screening events and optional onsite blood sample collection for tests are streamlined and empowering. We help employees identify existing healthy habits to build from, so they’re motivated to make improvements.
                                        </p>
                                        <p class="text-center">
                                            All-inclusive pricing with no hidden fees<br>
                                            Staffed by passionate healthcare professionals trained by us<br>
                                            Multiple screening options and flexible delivery models
                                        </p>
                                    </div>


                                   <div id="education">
                                       <h4 style="font-weight: bolder">
                                           Health Education Wellness Program.
                                       </h4>
                                       <p>
                                           Develop and support a culture of happiness and well-being within an organization. Help your employees live healthier, happier and longer with a solution that’s easy to use and easy to manage.
                                       </p>
                                       <p class="text-center">
                                           Engagement-based program drives results
                                           Integrates biometric screening data
                                           Offers a comprehensive view of your employees’ wellness
                                       </p>
                                   </div>

                                    <div id="assessment">
                                        <h4 style="font-weight: bolder">
                                            Health Assessment Program
                                        </h4>
                                        <p>
                                            Focus on health risks that really matter.
                                        </p>
                                        <p>
                                            Annual health assessments have been a staple of health promotion for years because they provide a snapshot of the health of an organization. This information can help company leaders discover health trends impacting their employee population and measure progress year-over-year. They  also help employees understand their current health status and create a solid foundation for making lifestyle changes. Health assessments create a teachable and actionable moment for your employees, which is a great first step for most wellness programs.
                                        </p>
                                    </div>

                                    <h4 style="font-weight: bolder">
                                        Health Screening Program
                                    </h4>
                                    <p>
                                        Health screening for insurance clients before issuing medical policy and pre employment health checkup for employers. This ensures and informs the company the present health status and well-being of the newly hired candidate on work or newly medical policy holder.

                                        Today it is customary for many companies to get the health checkup done at the time of hiring and on annual basis as well.
                                    </p>

                                    <h4>
                                        Are You An Employer?
                                    </h4>
                                    <p>
                                        If you are an employer, insurer looking to offer wellness programs to your own employees or partners, we can help with that too! We'd love to learn what you're looking for and help bring your corporate wellness vision alive.
                                    </p>
                                    <a href="{{ url('corporate') }}#start_corporate_plan" class="btn package_button" >Get Started Today</a>

                                </div>
                            </div>

                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>

@endsection
