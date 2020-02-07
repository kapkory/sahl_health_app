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
                    <h2 style="text-transform: capitalize; color: #335062">Sahl Corporate Packages</h2>
                    <p>
                        Invest in your employees’ health and wellness.
                    </p>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="container-fluid" style="background: #F5F5F5">
            <div class="row mt-2">
                <div class="col-md-5 offset-md-1" style="float: right">
                    <div class="col-md-12" style="padding-top: 10%">
                        <div >
                            <h4 style="text-align: center">Save up to 10% with Sahl Wellness Packages</h4>

                            <p>
                                Living well is an ongoing journey that can easily threaten your financial health.  Prevent more and save more with our preventive care and wellness plans.
                            </p>
                        </div>
                        <div class="row" style="padding-left: 20px">
                            <ul style="list-style-type: disc">
                                <li>
                                    They reduce occurrence of lifestyle diseases and rate of absenteeism
                                </li>

                                <li>
                                    They lower your annual healthcare and insurance costs
                                </li>

                                <li>
                                    They improve general performance and productivity
                                </li>
                                <li>
                                    They inspire more loyalty from your employees
                                </li>
                                <li>
                                    They improve your brand image and public relations
                                </li>
                            </ul>
                            <a href="#" class="btn" style="background: #F07A3B;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);border-radius: 8px; color: white">Explore The Packages</a>

                        </div>
                    </div>
                </div>


                <div style="padding: 0px !important;" class="col-md-6 mt-4">
                    <img style="object-fit: cover; width: 100%; max-height: 450px" src="{{ url('sahl/assets/image/sahl-health-user.svg') }}">
                </div>
            </div>
        </div>
    </div>





    <div class="row" style="background-color: white">
        <div class="container-fluid">
            <div class="col-10 offset-1 py-3">
                <div class="pd-content">

                    <h3 style="color: #335062">What kind of package are you looking for?</h3>
                    <ul style="list-style-type: none">
                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Preventive Care
                        </li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Basic Pre-employment Checks
                        </li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Comprehensive Pre-employment Checks
                        </li>

                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Annual Basic Screening
                        </li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Annual Comprehensive Screening
                        </li>

                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Maternal Care
                        </li>

                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Gym Membership
                        </li>

                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Nutrition Support
                        </li>

                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Health Awareness Workshops
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="row mt-2">
                <div style="padding: 0px !important;" class="col-md-6 mt-4">
                    <img style="object-fit: cover; width: 100%; max-height: 500px" src="{{ url('sahl/assets/image/contact-us.svg') }}">
                </div>
                <div class="col-md-6" style="float: right">
                    <div class="col-md-12">
                        <div class="mt-4">
                            <h4>Customize a package for your employees today</h4>
                        </div>
                        <div class="row">
                            @if (session('status'))
                                <div class="alert alert-success text-center">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="post" action="{{ url('contact-us') }}">
                                <div class="form-row m-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="text" name="name" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="Job Title" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="text" name="company" class="form-control" value="+254" placeholder="Company Name" >

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="text" name="employees" class="form-control" placeholder="Number of Employees">
                                        </div>
                                    </div>

                                    <div class="form-row m-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input required="required" type="text" name="name" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" required="required"  placeholder="Add Custom Plans" cols="4" rows="6" class="form-control"></textarea>
                                            @csrf
                                        </div>

                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <button type="submit" class="btn" style="color: white; background: #F07A3B;border-radius: 10px;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
