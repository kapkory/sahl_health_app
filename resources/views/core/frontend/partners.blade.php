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
                    <h2 class="p-2" style="text-transform: capitalize; color: #335062">
                        S-Connect Partner Network
                    </h2>
                    <div>
                        <p>Thrive in Africa, thrive with S-Connect</p>
                        <p>
                            Partner with S-Connect today to grow your customer base, accelerate your profits and create demand for your brand at local, regional and beyond Africa. Get involved through Health Partner Network and the Digital health Smart Practice These include referrals with residual agent commissions and partnerships that enable you to benefit from enhanced operational capabilities.
                        </p>
                    </div>

                    <h3 style="color: #335062">S-Connect-An African Health Hub</h3>
                    <div>
                        <p>
                            Transforming health everyday everywhere through innovation, information and partnership solutions connecting health consumers and health providers to deliver meaningful customer satisfaction and experience
                        </p>

                        <ul style="list-style-type: none">
                            <li> Hospital</li>
                            <li> Diagnostic and Laboratory</li>
                            <li> Pharmacy</li>
                            <li> Insurance</li>
                            <li> Wellness & Fitness</li>
                        </ul>
                    </div>
                    <h4 style="color: #335062">What we offer</h4>
                      <div>
                          There are two ways to get involved with S-Connect -<br>
                          <ul style="list-style-type: disc">
                              <li> Health Partner Network</li>
                              <li>  Digital Smart Practice</li>
                          </ul>
                      </div>

                    <h2 class="p-2" style="text-transform: capitalize; color: #335062">
                        Health Partner Network
                    </h2>
                    <div>
                        <p>
                            Join the more than 1000 health providers across Africa who delight in helping thousands of people seeking affordable, convenient and quality healthcare towards healthier life through discounted  and smart health offers through tour online health platform
                        </p>
                        <h4 style="color: #335062">
                            As a health partner in our Network, you will:
                        </h4>
                        <ul style="list-style-type: none">
                            <li class="cp-list-item">
                                <i class="fa fa-check-circle"></i>
                                Enhance your online presence and gain recognition for your expertise through  client engagement to improve your competitive advantage
                            </li>

                            <li class="cp-list-item">
                                <i class="fa fa-check-circle"></i>
                                Enjoy higher revenue; Improve your bottom line through promoting your services to our growing list of corporate and individual members
                            </li>

                            <li class="cp-list-item">
                                <i class="fa fa-check-circle"></i>
                                Easily access feedback from your clients through our online ratings to help you improve service delivery, receive instant feedback
                            </li>

                            <li class="cp-list-item">
                                <i class="fa fa-check-circle"></i>
                                Expand your client base through attracting customer loyalty and retention improving your bottom line for sustainable growth
                            </li>

                            <li class="cp-list-item">
                                <i class="fa fa-check-circle"></i>
                                Enjoy two slots of health article writing published on the health blog to improve access health information.
                            </li>


                            <li class="cp-list-item">
                                <i class="fa fa-check-circle"></i>
                                Exploit our smart health provider tools that improve customer relationship, experience and engagement.
                            </li>

                            <li class="cp-list-item">
                                <i class="fa fa-check-circle"></i>
                                Be automatic S-Connect agents with our robust partner profile and earn through selling Sahl Health membership and get rewarded to accelerate profits.
                            </li>

                        </ul>
                        <p>
                            Health providers on S-Connect must have an unrestricted, active medical business or Individual license in good standing with relevant authorities.<br>
                            <a href="{{ url('provider-register') }}">Join the Health Partner Network</a>

                        </p>

                    </div>
                    <h2 class="p-2" style="text-transform: capitalize; color: #335062">
                        Digital Smart Practice
                    </h2>

                    <h3 class="p-2" style="text-transform: capitalize; color: #335062">
                        1. Mobile Marketing System

                    </h3>
                    <h3>
                        Mobile Marketing Automation at Scale
                    </h3>
                    <p>
                        With S-Connect hundreds of health provider brands engage users across various touch points and lifecycle stages with our automated inbuilt  partner profile campaigns to boost user retention and long-term growth.
                    </p>
                    <h4 class="p-2" style="text-transform: capitalize; color: #335062">
                        See Improved Metrics with S-Connect
                    </h4>
                    <ul style="list-style-type: disc">
                        <li> Increase in marketing conversions</li>
                        <li> Increase retention through engagement</li>
                        <li> Increased revenue growth</li>
                    </ul>

                    <h3 class="p-2" style="text-transform: capitalize; color: #335062">
                        2. OneApp Smart Queue Management System
                    </h3>
                    <h5>
                        A Smart Management System To ;Save Your Queue Time

                    </h5>
                    <p>
                        OneApp Smart Appointment System offers an effective, convenient queue management solution to schedule appointments and manage lines for superior customer experience, lower costs, reduced walk-away and access to key data
                    </p>
                    <p>
                        A health service center or office is attractive when it is less crowded and with more space. A spacious office always invites a new customer and hence improves the productivity
                    </p>
                    <h4>
                        MAIN SYSTEM FEATURES
                    </h4>
                    <ul style="list-style-type: none">
                        <li class="cp-list-item">
                            <i class="fa fa-check-circle"></i>
                            Eliminate Long Lines & Reduce Walkaways
                        </li>
                        <li class="cp-list-item">
                            <i class="fa fa-check-circle"></i>
                            Reduce Customer Complaints
                        </li>
                        <li class="cp-list-item">
                            <i class="fa fa-check-circle"></i>
                            Boost Staff Productivity & Operational Efficiencies
                        </li>

                        <li class="cp-list-item">
                            <i class="fa fa-check-circle"></i>
                            Gain Valuable Insights with Tracking & Reporting

                        </li>

                    </ul>
                    <h5>Other Features</h5>
                    <ul style="list-style-type: circle">
                        <li>On premises Token Generation</li>
                        <li>Online Token Generation</li>
                        <li>Online Token Calling Feature</li>
                        <li>Call Station Configuration management</li>
                        <li>Location Management</li>
                        <li>Section Configuration Management</li>
                        <li>Department Association Management</li>
                        <li>Multi-location association Feature</li>
                        <li>Services Configuration and Management</li>
                        <li>User Roles and rights Management</li>
                        <li>Token should get generated for online user after registration.</li>
                        <li>Provision to display tokens on single/multi-screen at a time.</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>



@endsection
