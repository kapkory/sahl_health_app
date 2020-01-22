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
    </style>
    <!-- header close -->
    <div class="container-fluid">
        <!-- hero section start  -->
        <div class="hero-slide">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12  order-lg-0 order-sm-2">
                        <!-- search area start -->
                        <div class="hero-search-area">
                            <div class="hero-search-area-caption">
                                <h1 class="hero-search-area-caption-title">Access up to 20% discounts at your nearest health facility</h1>
                            </div>
                            <!-- search area start -->
                            <div class="hero-search-area-form">
                                @guest()
                                    <form class="form-row" method="post" class="ajax-post" action="{{ url('create-account') }}">
                                        <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11">

                                            <div class="form-group">
                                                <input type="text" required class="form-control" name="first_name" placeholder="First Name">
                                            </div>

                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required class="form-control" name="last_name" placeholder="Last Name">
                                            </div>

                                            <div class="form-group">
                                                <input type="email" required class="form-control" name="email" placeholder="Email Address">
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <button type="submit" class="btn btn-secondary" style="background-color: #F07A3B;border-color: inherit; color: white">Start Now</button>
                                            </div>


                                        </div>

                                    </form>
                                @else
                                    <div class="col-10">
                                        <div class="alert alert-success">
                                            Greetings {{ auth()->user()->name }},
                                            Thank you for checking in, <br>
                                            We look forward to hearing from you

                                        </div>
                                    </div>
                                @endguest
                            </div>
                            <!-- search area close -->
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <!-- hero slider start -->
                        <div class="hero-slider">
                            <div class="hero-slider-item">
                                <img style="max-height: 480px;width: 100%" src="{{ url('frontend/assets/images/slider/sahl-health.jpg') }}" alt="Sahl" class="img-fluid">
                            </div>

                            {{--                        <div class="hero-slider-item">--}}
                            {{--                            <img style="max-height: 480px;width: 100%" src="{{ url('frontend/assets/images/slider/slider-2.jpg') }}" alt="Sahl" class="img-fluid">--}}
                            {{--                        </div>--}}

                            {{--                        <div class="hero-slider-item">--}}
                            {{--                            <img style="max-height: 480px;width: 100%" src="{{ url('frontend/assets/images/slider/slider-3.png') }}" alt="Sahl" class="img-fluid">--}}
                            {{--                        </div>--}}

                        </div>
                        <!-- hero slider close -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid" style="background-color:#0E4D92; color: white">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
            <h2 class="section-heading-title text-center" style="color: white">
                What you get with our membership Plans
            </h2>
        </div>
        <div class="col-12">
            <div class="row pb-5">
                <div class="col-md-4">
                    <i class="fa fa-check-circle" ></i>
                    Words to Display
                </div>
                <div class="col-md-4">
                    <i class="fa fa-check-circle" ></i>
                    Group Membership
                </div>
                <div class="col-md-4">
                    <i class="fa fa-check-circle" ></i>
                    Group Membership
                </div>
            </div>
        </div>

        {{--        <div class="offset-xl-1 col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">--}}
        {{--            <div>--}}
        {{--                --}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>


    <div class="space-lg space-md space-xs pt-4">

        <div class="container">
            <h3 class="section-heading-title ">Featured Hospitals</h3>

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
                                <a href="{{ url('institution/'.$featured_hospital->slug) }}" class="rating-review" style="margin-right: 15px">{{ @$featured_hospital->getRatingCount() }}</a>
                            </div>
                            <div class="listing-content" style="padding-left: 10px; padding-top: 1px">
                                <div class="listing-content-head">
                                    <h3 class="listing-content-head-title">
                                        <a href="{{ url('institution/'.$featured_hospital->slug) }}">{{ \Illuminate\Support\Str::limit($featured_hospital->name,18,'...') }}</a>
                                    </h3>
                                    <p class="listing-content-head-text">Nairobi, Kenya</p>
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

    {{--Start Featured Hospital--}}
    <div class="space-lg space-md space-xs pt-4">

        <div class="container">
            <h3 class="section-heading-title ">Top Rated Hospitals</h3>

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

    <div class="space-lg space-md space-xs bg-light rounded">
        <div class="container" style="background-color: #234057 !important;">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <!-- section heading start  -->
                    <div class="section-heading text-center">
                        <h2 class="section-heading-title" style="color: white">List Your Hospital with Us</h2>
                        <p class="section-heading-text lead" style="color: white">
                            List your hospital, Insurance Company, Health Care with us and start offering your discount
                        </p>
                        <a href="{{ url('provider-register') }}" class="btn btn-primary" style="background-color: #F07A3B;border-color: #F07A3B; color: white">List Your Institution</a>

                    </div>
                    <!-- section heading close  -->
                </div>

            </div>
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
