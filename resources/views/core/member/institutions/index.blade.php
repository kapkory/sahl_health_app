@extends('layouts.admin')

@section('title','Institutions')

@section('content')
    <div class="row">
    @isset($institutions)
        @foreach($institutions as $institution)
    <!-- Grid Item -->
    <div class="col-xl-3 col-md-4 col-sm-6 col-12">

        <!-- Card -->
        <div class="card">

            <!-- Slider -->
            <div class="dt-slider">

                <!-- Slider Header -->
                <div class="dt-slider__header">
                    <span class="badge bg-orange text-white text-uppercase">Discount {{ $institution->discount.'%' }}</span>
                </div>
                <!-- /slider header -->

                <div class="owl-carousel owl-theme">
                    <img class="card-img-top" style="max-height: 250px" src="{{ ($institution->featured_image) ? url($institution->featured_image) :'' }}" alt="Hospital">
{{--                    <img class="card-img-top" src="assets/images/grid/living-room-6.jpeg"--}}
{{--                         alt="Living Room">--}}
{{--                    <img class="card-img-top" src="assets/images/grid/bedroom-6.jpeg" alt="Bedroom">--}}
                </div>

            </div>
            <!-- /slider -->

            <!-- Card Body -->
            <div class="card-body">
                <!-- Card Title-->
                <h3 class="card-title">{{ $institution->name }}</h3>
                <!-- Card Title-->

                <h5 class="card-subtitle">{{ @$institution->institutionLevel->name }}</h5>

                <!-- card Link -->
                <a class="card-link" href="javascript:void(0)">
                    Check Detail <i class="icon icon-double-arrow-right"></i>
                </a>
                <!-- card Link -->

            </div>
            <!-- /card body -->

        </div>
        <!-- /card -->
    </div>
    <!-- /grid item -->
        @endforeach
    @endisset
    </div>



    @endsection
