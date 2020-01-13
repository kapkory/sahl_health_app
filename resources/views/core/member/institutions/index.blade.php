@extends('layouts.admin')

@section('title','Institutions')

@section('content')
    <div class="row">
    @isset($institutions)
        @foreach($institutions as $institution)
            <!-- Grid Item -->
                <a class="col-xl-3 col-md-4 col-sm-6 col-12" href="{{ url('institution/'.$institution->slug) }}">

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
                                <img class="card-img-top" style="max-height: 110.25px" src="{{ ($institution->featured_image) ? url($institution->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="Hospital">
                            </div>

                        </div>
                        <!-- /slider -->

                        <!-- Card Body -->
                        <div class="card-body" style="padding: 3px">
                            <!-- Card Title-->
                            <h3>{{ $institution->name }}</h3>
                            <!-- Card Title-->

                            <h5 class="card-subtitle">{{ @$institution->institutionLevel->name }}</h5>

                        </div>
                        <!-- /card body -->

                    </div>
                    <!-- /card -->
                </a>
                <!-- /grid item -->
        @endforeach
    @endisset
    </div>

    @endsection
