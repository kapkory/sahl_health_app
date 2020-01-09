@extends('layouts.sahl')
@section('content')
    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('frontend/assets/background.jpg') }}");
        }
    </style>
        <div class="container-fluid bg-dark-myimg pb-md-5 mb-md-5 ">
            <div class="col-md-10 mx-auto">
                <div class="container py-md-5">
                    <div class="rounded">
                        <div class="row py-4">
                            <div class="col-md-8 pt-md-3 mt-md-3">
                                <h3 class="text-light">
                                    <b>SahlHealth <br>&nbsp;&nbsp;&nbsp; Health Care Service Providers</b>
                                </h3>
                            </div>
                            <div class="col-md-4 pt-md-3 mt-md-3">
                                <i
                                    class="fa fa-heartbeat text-light fa-5x float-md-right"
                                    aria-hidden="true"
                                ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                <!-- breadcrumb start -->
                <div class="custom-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Hospitals</li>
                        </ol>
                    </nav>
                </div>
                <!-- breadcrumb close -->
            </div>
        </div>
    </div>
    <div class="space-lg space-md space-xs">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="filter-sidebar">

                        <h3 class="filter-sidebar-title"><span class="filter-icon"><i class="fas fa-sliders-h"></i></span>Filter</h3>
                        <!-- filter widget start -->
{{--                        <div class="filter-sidebar-widget">--}}
{{--                            <a class="filter-title" data-toggle="collapse" href="listing-list-view.html#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">--}}
{{--                                Price <i class="fas fa-chevron-down"></i>--}}
{{--                            </a>--}}
{{--                            <div class="collapse show" id="collapseExample">--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck1">--}}
{{--                                    <label class="custom-control-label" for="customCheck1">$0 - $100--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck2">--}}
{{--                                    <label class="custom-control-label" for="customCheck2">$100 - $200--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck3">--}}
{{--                                    <label class="custom-control-label" for="customCheck3">$200 - $300--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck4">--}}
{{--                                    <label class="custom-control-label" for="customCheck4">$300 - $400--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck5">--}}
{{--                                    <label class="custom-control-label" for="customCheck5">$400 - $500--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="customCheck6">--}}
{{--                                    <label class="custom-control-label" for="customCheck6">$500 - $600--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- filter widget close -->--}}
{{--              --}}
{{--                        <!-- filter widget start -->--}}
{{--                        <div class="filter-sidebar-widget mt-2">--}}
{{--                            <a href="#" class="btn btn-primary btn-block">Search</a>--}}
{{--                        </div>--}}
{{--                        <!-- filter widget close -->--}}
                    </div>
                </div>


                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">

                    <div class="row">
                        @foreach($hospitals as $hospital)
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- listing block start -->
                            <div class="listing-block grid-listing">
                                <div class="listing-img">
                                    <a href="{{ url('institution/'.$hospital->slug) }}">
                                        <img style="max-height: 250px" src="{{ ($hospital->featured_image) ? url($hospital->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="{{ $hospital->name }}" class="img-fluid">
                                    </a>
                                    @if($hospital->discount > 0)
                                    <div class="listing-badge">Discount {{ $hospital->discount }}%</div>
                                    @endif

{{--                                    <div class="like-icon"></div>--}}
                                </div>
                                <div class="listing-content">
                                    <div class="listing-content-head">
                                        <h3 class="listing-content-head-title">
                                            <a href="{{ url('institution/'.$hospital->slug) }}">
                                                {{ $hospital->name }}
                                            </a>
                                        </h3>
                                        <p class="listing-content-head-text">Nairobi, Kenya</p>
                                    </div>

                                    <div class="listing-content-meta">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                <span class="value">{{ @$hospital->institutionLevel->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- listing block close -->
                        </div>
                        @endforeach

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                            <!-- pagination start -->
                            <nav aria-label="Page navigation example">
                                {{ $hospitals->links() }}
                            </nav>
                            <!-- pagination close -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection
