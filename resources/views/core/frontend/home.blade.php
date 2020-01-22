@extends('layouts.sahl')
@section('content')
    <style>
        .owl-prev,
        .owl-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .owl-prev {
            left: -2rem;
        }

        .owl-next {
            right: -2rem;
        }

        .owl-stage-outer{
           padding-bottom: 0px;
        }

        .item{
            background: #FFFFFF;
            border: 1px solid rgba(51, 80, 98, 0.5);
            box-sizing: border-box;
            box-shadow: 0px 6px 9px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .package_button{
            color: white;
            background-color: #F07A3B;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
         }

        .form-control::placeholder {
            color: white !important;
            opacity: 1;
        }
    </style>
<!-- header close -->
   <div class="row" style="background: linear-gradient(89.88deg, rgba(15, 21, 26, 0.52) -2.71%, rgba(51, 80, 98, 0.15) 99.7%), rgba(240, 122, 59, 0.41);">

            <img style="width: 100% !important;max-height: 500px;   object-fit: cover;" src="{{ url('sahl') }}/assets/image/slider-1.svg" alt="Sahl Health slider" >

             <!-- hero serach area start  -->
             <div class="hero-search-area">
                 <div class="row">
                     <div class="offset-xl-1 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                         <div class="hero-search-area-caption">
                             <h1 class="hero-search-area-caption-title">Now, Medical bills have no claim on your health and wellness.</h1>
                             <p class="hero-search-area-caption-text">
                                 Find the best hospitals and wellness clinics near you and save up to 20%
                                 all year long with My Sahl Health Plan
                             </p>
                         </div>
                         <div class="hero-search-area-form">
                             <a href="#" class="btn btn-primary " style="background-color: #F07A3B; border-color:#F07A3B;border-radius: 10px;">Start My Sahl Health Plan</a>
                         </div>
                         <div class="row">
                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                 <p class="hero-search-area-form-small-text">
                                     <a style="text-decoration: underline" href="{{ url('hospitals') }}"> Find Discounts Nearby</a>
                                 </p>
                             </div>
                         </div>
                     </div>
{{----}}
                 </div>
             </div>
             <!-- hero serach area close  -->
{{--         </div>--}}

</div>
    <div class="row" style="background-color:#335062;">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
            <h2 class="section-heading-title text-center" style="color: white">
                My Sahl Health Plan
            </h2>
        </div>
        <div class="col-8 offset-2">
            <p style="text-align: center;color:#FFFFFF; font-family: Montserrat;font-style: normal;font-weight: normal;font-size: 16px;line-height: 159.5%;">
                The best healthcare costs an arm and a leg, but a Sahl Health Plan means you never have to get to that point. We have made it easy and affordable to take care of your health and wellness every day, as a way of life. Choose a plan that is right for you, your loved ones or employees.
            </p>
        </div>
    </div>
    <div class="row" style="background-color:#335062;">
        <div class="container-fluid my-3" >
            <div class="col-10 offset-1">
                <div class="testimonial-carousel">
                    <div class="owl-carousel owl-theme owl-testimonial">
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="testimonial-block">
                                <div class="testimonial-content">
                                    <svg width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="45" cy="45" r="45" fill="#7BB37D"/>
                                    </svg>
                                    <div>
                                        <h5>Individual Plan</h5>
                                        <h4>
                                            Ksh 2499<br>
                                            <small>Per Year</small>
                                        </h4>

                                    </div>
                                    <div class="testimonial-content-text">
                                        <p>
                                            Young and single? Older and flying solo? Cover yourself so you have more freedom to explore and live life to the full
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn package_button m-2 " style="color: white;">Start My Plan</button>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="testimonial-block">
                                <div class="testimonial-content">
                                    <svg width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="45" cy="45" r="45" fill="#7BB37D"/>
                                    </svg>

                                    <div>
                                        <h5>3 Member Plan</h5>
                                        <h4>
                                            Ksh 5499<br>
                                            <small>Per Year</small>
                                        </h4>

                                    </div>

                                    <div class="testimonial-content-text">
                                        <p>
                                            Young couples, those thinking of kids, and older couples with differing needs can easily combine their cover                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn package_button m-2 " style="color: white;">Start My Plan</button>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">

                            <!-- testimonial start  -->
                            <div class="testimonial-block">
                                <div class="testimonial-content">
                                    <svg width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="45" cy="45" r="45" fill="#7BB37D"/>
                                    </svg>
                                    <div>
                                        <h5>4 Member Plan</h5>
                                        <h4>
                                            Ksh 5999<br>
                                            <small>Per Year</small>
                                        </h4>

                                    </div>

                                    <div class="testimonial-content-text">
                                        <p>
                                            Young and single? Older and flying solo? Cover yourself so you have more freedom to explore and live life to the full
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn package_button m-2 " style="color: white;">Start My Plan</button>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        <div class="item">
                            <!-- testimonial start  -->
                            <div class="testimonial-block">
                                <div class="testimonial-content">

                                    <svg width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="45" cy="45" r="45" fill="#7BB37D"/>
                                    </svg>
                                    <div>
                                        <h5>Corporate Membership</h5>
                                        <h4>
                                            Ksh 5499<br>
                                            <small>Per Year</small>
                                        </h4>

                                    </div>

                                    <div class="testimonial-content-text">
                                        <p>
                                            Young and single? Older and flying solo? Cover yourself so you have more freedom to explore and live life to the full.
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn package_button m-2 " style="color: white;">Start My Plan</button>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="container-fluid">
           <div class="text-center mt-5">
               <h3 class="section-heading-title " style="color: #335062">
                   Prevent more and save more with Sahl Health Plans
               </h3>
               <p style="color: #335062">
                   We have over 500 healthcare providers at your service countrywide.
               </p>
           </div>

            <div class="row">
                <div class="post-carousel offset-1 col-10">
                    <div class="owl-post-save-more owl-carousel owl-theme">
                        <div class="item" style="border-style: none;background: linear-gradient(358.96deg, rgba(3, 3, 3, 0.97) 0.63%, rgba(255, 255, 255, 0) 98.25%)">
                            <div class="post-imgoverlay">
                                <!-- post classic block -->
                                <div class="post-imgoverlay-img">
                                    <a href="#">
                                        <img src="{{ url('sahl') }}/assets/image/inpatient.svg" alt="Save More at Sahl Health" style="border-radius: 0px;max-height: 400px" class="img-fluid">
                                    </a>
                                    <div class="post-imgoverlay-content">
                                        <h4 class="post-title"><a href="#" class="title">Save up to 20% on inpatient bills </a></h4>
                                        <div class="post-meta">
                                            <div class="meta">
                                                <button class="btn package_button m-2 " style="color: white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">Find More</button>

                                            </div>
                                            <!-- postmeta close -->
                                        </div>
                                    </div>
                                    <!-- postmeta start -->
                                </div>
                            </div>
                        </div>
                        <div class="item" style="border-style: none;background: linear-gradient(358.96deg, rgba(3, 3, 3, 0.97) 0.63%, rgba(255, 255, 255, 0) 98.25%);">
                            <div class="post-imgoverlay">
                                <!-- post classic block -->
                                <div class="post-imgoverlay-img">
                                    <a href="#">
                                        <img  src="{{ url('sahl') }}/assets/image/outpatient.svg" alt="Save More at Sahl Health" class="img-fluid" style="border-radius: 0px; max-height: 400px">
                                    </a>
                                    <div class="post-imgoverlay-content">
                                        <h4 class="post-title">
                                            <a href="#" class="title">Save up to 20% on on outpatient bills</a>
                                        </h4>
                                        <div class="post-meta">
                                            <div class="meta">
                                                <button class="btn package_button m-2 " style="color: white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">Find More</button>

                                            </div>
                                            <!-- postmeta close -->
                                        </div>
                                    </div>
                                    <!-- postmeta start -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>


    <div class="row" style="background-color: #234057 !important;font-family: Montserrat;font-style: normal;">
        <div class="container-fluid">
            <div class="text-center my-5 ">
                <h3 class="section-heading-title " style="color: white">
                    Smartest way to access health.<br> Save More and Prevent More
                </h3>

                <form>
                    <div class="row">
                        <div class="col-md-4">
                                <input  type="text" name="name" class="form-control" placeholder="Your Name" style="background-color: #234057; color: white">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="email" class="form-control" placeholder="Your Email" style="background-color: #234057; color: white">
                        </div>
                        @csrf
                        <div class="col-md-4">
                            <input type="text" name="phone_number" class="form-control" placeholder="Your Mobile" style="background-color: #234057">
                        </div>

                    </div>
                    <div class="text-center mt-2">
                        <button class="btn package_button m-2 text-center" style="color: white; border-radius: 10px">Get Started</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


        <div class="row">
            <div class="container-fluid">
                <div class="text-center my-5 ">
                    <h3 class="section-heading-title " style="color: #335062">
                        Looking for Something Else?
                    </h3>
                    <h5 style="color: #335062;">
                        We have over 500 healthcare providers at your service countrywide.
                    </h5>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-2">
                        <div class="text-center">
                            <img  src="{{ url('sahl/assets/image') }}/nearby_hospital.svg" alt="Find A Hospital Near You">
                            <h4>Find A Hospital<br> Near You</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <img class="text-center" src="{{ url('sahl/assets/image') }}/compare-charges.svg" alt="Compare Hospital Charges">
                            <h4>Compare Hospital Charges</h4>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <img  src="{{ url('sahl/assets/image') }}/wellness.svg" alt="Talk to a Wellness Expert">
                            <h4>Talk to a Wellness <br> Expert</h4>

                        </div>
                      </div>
                </div>
            </div>
        </div>



    {{--Start Featured Hospital--}}
    <div class="space-lg space-md space-xs pt-4" style="rgba(229, 229, 229, 0.4)">

        <div class="container">
            <div class="text-center">
                <h4 class="section-heading-title ">
                    Check out our range of service providers around the country
                </h4>
            </div>

            <div class="row owl-carousel owl-featured" style="padding-bottom: 0px !important;">

                @foreach($featured_hospitals as $featured_hospital)
                    <div class="item">
                    <!-- listing block start  -->
                        <div class="listing-block " style="padding-bottom: 1px">
                            <div class="listing-img">
                                <a href="{{ url('institution/'.$featured_hospital->slug) }}">
                                    <img src="{{ url($featured_hospital->featured_image) }}" alt="{{ $featured_hospital->name }}" class="img-fluid institution_image">
                                </a>
                                <div class="listing-badge">Discount: {{ $featured_hospital->discount }}%</div>

                                <div style="top: 0px" class="like-icon"></div>
                            </div>
                            <small class="lable text-muted" style="padding-left: 10px;">{{ @$featured_hospital->institutionLevel->name }}</small>

                            <div class="review-content-rating float-right pt-2">
                                <span class="star" style="float: right"></span>
                                <a href="{{ url('institution/'.$featured_hospital->slug) }}" class="rating-review" style="margin-right: 15px">{{  @$featured_hospital->getRatingCount() }}</a>
                            </div>
                            <div class="listing-content" style="padding-left: 10px; padding-top: 5px; padding-bottom: 5px">
                                <div class="listing-content-head">
                                    <h3 class="listing-content-head-title">
                                        <a href="{{ url('institution/'.$featured_hospital->slug) }}">{{ \Illuminate\Support\Str::limit($featured_hospital->name,18,'...') }}</a>
                                    </h3>
                                    <p class="listing-content-head-text">Nairobi, Kenya </p>
                                </div>
                            </div>
                        </div>

                        <!-- listing block close  -->
                    </div>

                @endforeach

            </div>
            <a style="padding-left: 0px !important;" href="{{ url('hospitals') }}" class="btn btn-link">View all &nbsp;></a>
        </div>
    </div>

<div class="space-lg space-md space-xs">
    <div class="container">
        <div class="row text-center">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section-heading">
                <h2 style="text-align: center !important;">Our Partners </h2>
            </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <!-- client logo start  -->
                <div class="client-logo">
                    <img src="{{ url('frontend/assets/images/partners/neoscience-africa.png') }}" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                </div>
                <!-- client logo close  -->
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <!-- client logo start  -->
                <div class="client-logo">
                    <img src="{{ url('frontend/assets/images/partners/pathcare.png') }}" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                </div>
                <!-- client logo close  -->
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <!-- client logo start  -->
                <div class="client-logo">
                    <img src="{{ url('frontend/assets/images/partners/thebhub.png') }}" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                </div>
                <!-- client logo close  -->
            </div>

        </div>
    </div>
</div>
    @endsection
