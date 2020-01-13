@extends('layouts.admin')

@section('content')
    <!-- Grid Item -->
    <div class="col-xl-12">
       <div class="row">
           <div class="col-md-8 pb-3">
               @if($memberPackage)
                   <h3>Current Plan: <span class="text-success">{{ @$memberPackage->package->name }}</span></h3>
                   @if($memberPackage->ends_at)
                       Expires on {{ $memberPackage->ends_at }}
                   @else
                       Status: <span class="text-danger h4">Unpaid</span><br>
                       <a class="btn btn-info btn-sm rounded-0" style="font-size: 13px" href="{{ url('member/payment') }}">Pay <b>KES {{ $memberPackage->amount }}</b> for your Package</a>

                   @endif
               @else
                   <a class="btn btn-primary btn-sm rounded-0" style="font-size: 13px" href="{{ url('complete-registration?type=email') }}">Choose a Membership Package</a>
               @endif
           </div>

           <div class="col-md-4">

           </div>

       </div>

            <div class="card">
                <div class="row mt-3">
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

        </div>

    </div>
    <!-- /grid item -->
    @endsection
