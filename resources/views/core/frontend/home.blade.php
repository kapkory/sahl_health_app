@extends('layouts.sahl')
@section('content')
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
                                    <button class="btn btn-secondary">Search</button>
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

<div class="space-lg space-md space-xs pt-4">
    <div class="container">
        <div class="row">
            <!-- section heading start  -->
            <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section-heading text-center">
                    <h2 class="section-heading-title">Explore our Featured Hospitals</h2>
                </div>
            </div>
            <!-- section heading close  -->
        </div>
        <div class="row">
            @foreach($featured_hospitals as $featured_hospital)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <!-- listing block start  -->
                <div class="listing-block">
                    <div class="listing-img">
                        <a href="{{ url('institution/'.$featured_hospital->slug) }}"> <img src="{{ url($featured_hospital->featured_image) }}" alt="{{ $featured_hospital->name }}" class="img-fluid"></a>
                        <div class="listing-badge">Discount {{ $featured_hospital->discount }}</div>

                        <div class="like-icon"></div>
                    </div>
                    <div class="listing-content">
                        <div class="listing-content-head">
                            <h3 class="listing-content-head-title"> <a href="{{ url('institution/'.$featured_hospital->slug) }}">{{ $featured_hospital->name }}</a></h3>
                            <p class="listing-content-head-text">Nairobi, Kenya</p>
                        </div>
{{--                        <div class="review-content-rating">--}}
{{--                            <span class="star"></span>--}}
{{--                            <span class="star"></span>--}}
{{--                            <span class="star"></span>--}}
{{--                            <span class="star"></span>--}}
{{--                            <span class="star empty"></span>--}}
{{--                            <a href="listing-single.html" class="rating-review">4.0</a>--}}
{{--                        </div>--}}
                        <div class="listing-content-meta">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                     <span class="value">{{ @$featured_hospital->institutionLevel->name }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- listing block close  -->
            </div>
            @endforeach
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mt-3">
                <a href="{{ url('hospitals') }}" class="btn btn-outline-primary">Browse all Hospitals</a>
            </div>
        </div>
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
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <!-- client logo start  -->
                <div class="client-logo">
                    <img src="{{ url('sahl/assets') }}/images/logo-buffer.png" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                </div>
                <!-- client logo close  -->
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <!-- client logo start  -->
                <div class="client-logo">
                    <img src="{{ url('sahl/assets') }}/images/logo-buzzumo.png" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                </div>
                <!-- client logo close  -->
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <!-- client logo start  -->
                <div class="client-logo">
                    <img src="{{ url('sahl/assets') }}/images/logo-clearbit.png" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                </div>
                <!-- client logo close  -->
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <!-- client logo start  -->
                <div class="client-logo">
                    <img src="{{ url('sahl/assets') }}/images/logo-converkit.png" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                </div>
                <!-- client logo close  -->
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <!-- client logo start  -->
                <div class="client-logo">
                    <img src="{{ url('sahl/assets') }}/images/logo-envato.png" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                </div>
                <!-- client logo close  -->
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <!-- client logo start  -->
                <div class="client-logo">
                    <img src="{{ url('sahl/assets') }}/images/logo-frame.png" alt="spacely realtor directory listing bootstrap template" class="img-fluid">
                </div>
                <!-- client logo close  -->
            </div>
        </div>
    </div>
</div>
    @endsection
