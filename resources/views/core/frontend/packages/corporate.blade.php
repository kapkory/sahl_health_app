@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/corporate.jpg') }}") !important;
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
        li.cp-list-item {
            margin:0 0 10px 0;
            font-family: Montserrat;
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
                    <h2 style="text-transform: capitalize; color: #335062">Sahl Corporate Health and Wellness</h2>
                    <p style="font-family: Roboto;color: rgba(12, 3, 3, 0.69);">
                        Your employees are your most important assets. Anything that affects their physical and mental health affects their performance at the workplace. Invest in their health and well-being.
                    </p>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="container-fluid" style="background: #F5F5F5">
            <div class="row mt-2">
                <div class="col-md-5 offset-md-1" style="float: right">
                    <div class="col-md-12" style="padding-top: 2%">
                        <div>
                            <h3 style="font-family: Montserrat; color: #496A7E">The benefits of starting a corporate plan are plenty, no matter how many employees you have.</h3>
                        </div>
                        <div class="row" style="padding-left: 20px">
                            <ul style="list-style-type: none">
                                <li class="cp-list-item">
                                   <i class="fa fa-check-circle"></i> You reduce your total annual healthcare and insurance costs by up to 15%
                                </li>

                                <li class="cp-list-item">
                                    <i class="fa fa-check-circle"></i>  You get unlimited offers and discounts of up to 20% from our healthcare and wellness partners, making quality healthcare affordable to your employees.
                                </li>

                                <li class="cp-list-item">
                                    <i class="fa fa-check-circle"></i> With your employees healthy, they become happier, more productive and ultimately loyal
                                </li>
                                <li class="cp-list-item">
                                    <i class="fa fa-check-circle"></i> Your brand reputation improves
                                </li>
                            </ul>
                            <a href="#" class="btn" style="background: #F07A3B;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);border-radius: 8px; color: white">Start a Corporate Plan</a>

                        </div>
                    </div>
                </div>


                <div style="padding: 0px !important;" class="col-md-6">
                    <img style="object-fit: cover; width: 100%; max-height: 500px" src="{{ url('sahl/assets/image/corporate.svg') }}">
                </div>
            </div>
        </div>
    </div>





    <div class="row" style="background-color: white">
        <div class="container-fluid">
            <div class="col-md-10 offset-md-1 py-3">
                <div class="text-center py-3">
                    <h3 style="color: #335062"> Choose your packages and customize your plan</h3>
                </div>
                <div class="row">

                    <div class="col-md-10 offset-md-1 col-sm-12">
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

    <div class="row">
        <div class="container-fluid">
            <div class="row" style="background: #F5F5F5;">
                <div style="padding: 0px !important;" class="col-md-6">
                    <img style="object-fit: cover; width: 100%; height: 500px" src="{{ url('sahl/assets/image/contact-us.svg') }}">
                </div>
                <div class="col-md-6 col-sm-12 mt-4" style="float: right;">
                    <div class="col-md-12 px-2">
                        <div class="pt-4">
                            <h4 style="color:#335062;">What else is on your mind?</h4>
                            <p style="color: #335062">
                                 Let’s chat and customize your package.
                            </p>
                        </div>
                        <div class="row">
                            @if (session('status'))
                                <div class="alert alert-success text-center">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="post" action="{{ url('corporate-packages') }}" >
                                <div class="form-row m-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="text" name="name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="Job Title" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="text" name="company" class="form-control" value="" placeholder="Company Name" >

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="text" name="employees" class="form-control" placeholder="Number of Employees">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row m-2">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number" >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="email" name="email" class="form-control" placeholder="Your Email Address">
                                        </div>
                                    </div>
                                    @csrf

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
