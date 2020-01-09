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
        @media only screen and (min-width: 600px) {
           .institution_image{
            height: 179px !important;
            width: 269px!important;
           }
        }
        .listing-badge{
            background-color: #313d4f;
            color: white;
            top:0px;
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
                            <form class="form-row">
                                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="Last Name">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" name="first_name" placeholder="Email Address">
                                    </div>

                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button class="btn btn-secondary">Create Account</button>
                                </div>
                            </form>
                        </div>
                        <!-- search area close -->
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <!-- hero slider start -->
                    <div class="hero-slider">
                        <div class="hero-slider-item">
                            <img style="max-height: 450px;width: 100%" src="{{ url('frontend/assets/images/sahl-health.jpg') }}" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                        </div>
{{--                        <div class="hero-slider-item">--}}
{{--                            <img style="max-height: 450px;width: 100%" src="{{ url('frontend/assets/images/kenya-red-cross-ambulance.jpg') }}" alt="spacely realtor directory listing bootstrap template" class="img-fluid">--}}
{{--                        </div>--}}
{{--                        <div class="hero-slider-item">--}}
{{--                            <img style="max-height: 450px;width: 100%" src="{{ url('frontend/assets/images/separation_of_conjoined_twins-700x500.jpg') }}" alt="spacely realtor directory listing bootstrap template" class="img-fluid">--}}
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


    <div class="space-lg space-md space-xs pt-4">

        <div class="container">
            <h3 class="section-heading-title ">Featured Hospitals</h3>

            <div class="row owl-carousel owl-featured" style="padding-bottom: 0px !important;">

                @foreach($featured_hospitals as $featured_hospital)
                    <div class="item">

                    {{--                    <div class="">--}}
                    <!-- listing block start  -->
                        <div class="listing-block ">
                            <div class="listing-img">
                                <a href="{{ url('institution/'.$featured_hospital->slug) }}">
                                    <img src="{{ url($featured_hospital->featured_image) }}" alt="{{ $featured_hospital->name }}" class="img-fluid institution_image">
                                </a>
                                <div class="listing-badge">Discount: {{ $featured_hospital->discount }}%</div>

                                <div class="like-icon"></div>
                            </div>
                            <small class="lable" style="padding-left: 10px">{{ @$featured_hospital->institutionLevel->name }}</small>

                            <div class="listing-content" style="padding-left: 10px; padding-top: 1px">
                                <div class="listing-content-head">
                                    <h3 class="listing-content-head-title">
                                        <a href="{{ url('institution/'.$featured_hospital->slug) }}">{{ \Illuminate\Support\Str::limit($featured_hospital->name,18,'...') }}</a>
                                    </h3>
                                    <p class="listing-content-head-text">Nairobi, Kenya</p>
                                </div>
                                <div class="listing-content-meta">
                                    <div class="row">
                                        {{--                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">--}}
                                        {{--                                     <span class="value">{{ @$featured_hospital->institutionLevel->name }}</span>--}}
                                        {{--                                </div>--}}

                                    </div>
                                </div>
                            </div>
                            @if($loop->first)
                                <a style="padding-left: 0px !important;" href="{{ url('hospitals') }}" class="btn btn-link">View all &nbsp;></a>

                            @endif
                        </div>
                        <!-- listing block close  -->
                        {{--            </div>--}}
                    </div>
                @endforeach
            </div>


            {{--        </div>--}}
        </div>
    </div>
{{--Start Featured Hospital--}}
    <div class="space-lg space-md space-xs pt-4">

        <div class="container">
            <h3 class="section-heading-title ">Top Rated Hospitals</h3>

            <div class="row owl-carousel owl-featured" style="padding-bottom: 0px !important;">

                @foreach($featured_hospitals as $featured_hospital)
                    <div class="item">

                    {{--                    <div class="">--}}
                    <!-- listing block start  -->
                        <div class="listing-block ">
                            <div class="listing-img">
                                <a href="{{ url('institution/'.$featured_hospital->slug) }}">
                                    <img src="{{ url($featured_hospital->featured_image) }}" alt="{{ $featured_hospital->name }}" class="img-fluid institution_image">
                                </a>
                                <div class="listing-badge">Discount: {{ $featured_hospital->discount }}%</div>

                                <div class="like-icon"></div>
                            </div>
                            <small class="lable" style="padding-left: 10px">{{ @$featured_hospital->institutionLevel->name }}</small>

                            <div class="listing-content" style="padding-left: 10px; padding-top: 5px">
                                <div class="listing-content-head">
                                    <h3 class="listing-content-head-title">
                                        <a href="{{ url('institution/'.$featured_hospital->slug) }}">{{ \Illuminate\Support\Str::limit($featured_hospital->name,18,'...') }}</a>
                                    </h3>
                                    <p class="listing-content-head-text">Nairobi, Kenya</p>
                                </div>
                                <div class="listing-content-meta">
                                    <div class="row">
                                        {{--                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">--}}
                                        {{--                                     <span class="value">{{ @$featured_hospital->institutionLevel->name }}</span>--}}
                                        {{--                                </div>--}}

                                    </div>
                                </div>
                            </div>
                            @if($loop->first)
                                <a style="padding-left: 0px !important;" href="{{ url('hospitals') }}" class="btn btn-link">View all &nbsp;></a>

                            @endif
                        </div>

                        <!-- listing block close  -->
                        {{--            </div>--}}
                    </div>
                @endforeach

            </div>



            {{--        </div>--}}
        </div>
    </div>

    <div class="space-lg space-md space-xs bg-light rounded">
    <div class="container">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- section heading start  -->
                <div class="section-heading text-center">
                    <h2 class="section-heading-title">List Your Hospital with Us</h2>
                    <p class="section-heading-text lead">
                        List your hospital, Insurance Company, Health Care with us and start offering your discount
                    </p>
                </div>
                <!-- section heading close  -->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- process block start  -->
                <div class="process-block">
                    <div class="process-block-number">1</div>
                    <div class="process-content">
                        <div class="process-content-icon">
                            <img src="{{ url('sahl/assets') }}/images/location-map.png" alt="spacely realtor directory listing bootstrap template">
                        </div>
                        <h3 class="process-content-title">Create an Account</h3>
                        <p>It takes no longer than 1 minutes to create a providers account on Sahlhealth. </p>
                    </div>
                </div>
                <!-- process block close  -->
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- process block start  -->
                <div class="process-block">
                    <div class="process-block-number">2</div>
                    <div class="process-content">
                        <div class="process-content-icon">
                            <img src="{{ url('sahl/assets') }}/images/graph-icon.png" alt="Sahl Health">
                        </div>
                        <h3 class="process-content-title">Get more orders</h3>
                        <p>
                        Fill all the required Organization fields accordingly, Our Administrator will review your application
                        </p>
                    </div>
                </div>
                <!-- process block close  -->
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- process block start  -->
                <div class="process-block">
                    <div class="process-block-number">3</div>
                    <div class="process-content">
                        <div class="process-content-icon">
                            <img src="{{ url('sahl/assets') }}/images/money-icon.png" alt="Sahlhealth">
                        </div>
                        <h3 class="process-content-title">Earn money</h3>
                        <p>
                            Sahlhealth shall list your Institution on our site and our members shall be able to easily visit your premise.
                        </p>
                    </div>
                </div>
                <!-- process block close  -->
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mt-5">
                <a href="{{ url('provider-register') }}" class="btn btn-outline-primary">Create an Institution</a>
            </div>
        </div>
    </div>
</div>
<div class="space-lg space-md space-xs">
    <div class="container">
        <div class="row">
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 text-center mb-5 ">
                <!-- section heading start  -->
                <div class="section-heading">
                    <h2 class="section-heading-title">Market leaders are already with us </h2>
                    <p class="lead">The largest coworking and smart office spaces across world chose to work with us. Dozens of smart spaces use our software to manage hundreds of locations.
                    </p>
                </div>
                <!-- section heading close  -->
            </div>
        </div>
    </div>
</div>
    @endsection
