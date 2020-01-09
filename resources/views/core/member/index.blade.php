@extends('layouts.admin')

@section('content')
    <!-- Grid Item -->
    <div class="col-xl-12">
       <div class="row">
           <div class="col-md-8">
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
{{--               @if($memberPackage)--}}
{{--                   @if(!$memberPackage->ends_at)--}}
{{--                   <div class="jumbotron">--}}
{{--                       <div class="p-2">--}}
{{--                           <p>--}}
{{--                               We have received your order for  <strong>{{  }}</strong>--}}
{{--                               Please pay the amount following these instructions                            </p>--}}
{{--                           <ul>--}}
{{--                               <li>Go to MPESA paybill</li>--}}
{{--                               <li>Enter Paybill as <strong>698 489</strong></li>--}}
{{--                               <li>Enter Account name--}}
{{--                                   <strong>Universal Plus</strong></li>--}}
{{--                               <li>Enter Amount as <strong>500.00 </strong></li>--}}
{{--                               <li>Enter your MPESA pin</li>--}}
{{--                           </ul>--}}
{{--                       </div>--}}
{{--                   </div>--}}
{{--                       @endif--}}
{{--                   @endif--}}
           </div>

       </div>

        <div class="row mt-3">
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
                                    <img class="card-img-top" style="max-height: 250px" src="{{ ($institution->featured_image) ? url($institution->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="Hospital">
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

    </div>
    <!-- /grid item -->
    @endsection
