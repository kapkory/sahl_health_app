@extends('layouts.sahl')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- listing nav start -->
                <div class="listing-nav sticky">
                    <ul>
                        <li>
                            <a class="page-scroll" href="#overview">Overview </a>
                        </li>
                    </ul>
                </div>
                <!-- listing nav close -->
            </div>
        </div>
    </div>
    <div class="listing-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <div class="listing-detail-header" id="overview">
                        <!-- listing detail head start -->
                        <div class="listing-detail-head">
                            <h2 class="listing-detail-head-title">{{ $institution->name }}</h2>
                        </div>
                        <div class="listing-detail-body">
                            <div class="row no-gutters">
                                <div class="post-img">
                                    <img src="{{ ($institution->featured_image) ? url($institution->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="{{ $institution->name }}" class="img-fluid">

                                </div>
                            </div>
                        </div>
                        <div class="listing-detail-body">
                            <div class="row no-gutters">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 border-right">
                                    <div class="listing-detail-body-meta">
                                        <div class="meta-icon"> <i class="fas fa-calendar-alt"></i></div>
                                        <h4 class="meta-lable">{{ @$institution->institutionLevel->name }}</h4>
                                        <span class="meta-value">Level</span>
                                    </div>
                                </div>
                                @if($institution->address_postal_code)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 border-right">
                                    <div class="listing-detail-body-meta">
                                        <div class="meta-icon"> <i class="fas fa-vector-square"></i></div>
                                        <h4 class="meta-lable">{{ $institution->address_postal_code }}</h4>
                                        <span class="meta-value">Postal Code</span>
                                    </div>
                                </div>
                                    @endif

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 border-right">
                                    <div class="listing-detail-body-meta">
                                        <div class="meta-icon"> <i class="fas fa-map"></i></div>
                                        <h4 class="meta-lable">Nairobi, Kenya</h4>
                                        <span class="meta-value">Location</span>
                                    </div>
                                </div>
                                @if($institution->discount > 0)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 border-right">
                                    <div class="listing-detail-body-meta">
                                        <div class="meta-icon"> <i class="fas fa fa-circle-o"></i></div>
                                        <h4 class="meta-lable">

                                                <div class="sticky-badge">Discount {{ $institution->discount }}%</div>

                                        </h4>
                                        <span class="meta-value">Discount</span>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                        <!-- listing detail head close -->
                    </div>



                </div>
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                    <!-- listing detail start -->
                    <div class="listing-sidebar">
                        @if($institution->user->phone_number)
                        <!-- listing widget start -->
                        <div class="listing-sidebar-widget">
                            <a href="tel:{{ $institution->user->phone_number }}" class="btn btn-primary btn-block">Call to Institution</a>
                        </div>
                        <!-- listing widget close -->
                            @else
                                <div class="listing-sidebar-widget">
                                    <a href="mailto:{{ $institution->user->email }}" class="btn btn-primary btn-block">Email Institution</a>
                                </div>
                            @endif

                    </div>
                    <!-- listing detail close -->

                    @if($institution->intro)
                        <!-- listing detail start -->
                            <div class="listing-detail-card" id="about">
                                <h4 class="listing-detail-card-title">Description</h4>
                                <p>{{ $institution->intro }}</p>
                            </div>
                            <!-- listing detail close -->
                    @endif

                    <!-- listing detail start -->
                    <div class="listing-detail-card amenities" id="amenities">
                        <h4 class="listing-detail-card-title">Services</h4>
                        <ul class="list-inline">
                            <li class="list-inline-item">WiFi</li>
                            <li class="list-inline-item">Parking</li>
                            <li class="list-inline-item">24/7 access</li>
                            <li class="list-inline-item">Kitchen</li>
                            <li class="list-inline-item">Phone</li>
                            <li class="list-inline-item">Receptionist</li>
                            <li class="list-inline-item">Scan</li>
                            <li class="list-inline-item">Tea & coffee</li>
                        </ul>
                    </div>
                    <!-- listing detail close -->
                </div>
            </div>
        </div>
    </div>
    @endsection
