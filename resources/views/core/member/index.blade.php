@extends('layouts.admin')

@section('content')
    <!-- Grid Item -->
    <div class="col-xl-12">
       <div class="row">
           <div class="col-md-4">
               <div class="dt-card p-2">
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
           </div>

           <div class="col-md-3">
               <div class="dt-card">

                   <!-- Card Body -->
                   <div class="dt-card__body px-5 py-4">
                       <h6 class="text-body text-uppercase mb-2">Hospital Visits</h6>
                       <div class="d-flex align-items-baseline mb-4">
                           <span class="display-4 text-center font-weight-500 text-dark ">{{ $data['visits'] }} visit(s)</span>
                       </div>

                       <div class="dt-indicator-item__info mb-2" data-fill="100" data-max="100">
                           <div class="dt-indicator-item__bar">
                               <div class="dt-indicator-item__fill fill-pointer bg-primary" style="width: 100%;"></div>
                           </div>
                       </div>
                   </div>
                   <!-- /bard body -->

               </div>
           </div>

       </div>

            <div class="card">
                <div class="card-title pl-4 pt-3">
                    Favorite Hospitals
                </div>
                <div class="row mt-3">
            @if(count($favorite_institutions) > 0)
                @foreach($favorite_institutions as $institution)
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
                                    <span>{{ @$institution->institutionLevel->name }}</span>

                                    <h3>{{ $institution->name }}</h3>
                                    <!-- Card Title-->

                                </div>
                                <!-- /card body -->

                            </div>
                            <!-- /card -->
                        </a>
                        <!-- /grid item -->
                    @endforeach

                @else
                <div class="col-12 ">
                    <p class="text-info pl-3" style="font-size: 14px">
                        You have not selected a favourite Hospital, Proceed to  <a class="btn badge btn-outline-secondary" href="{{ url('member/institutions') }}">Hospitals </a> and Click on the <i class="icon icon-heart-o text-black-50 font-weight-600"></i> (heart) button to Select
                    </p>
                </div>
                @endif
            </div>

        </div>

    </div>
    <!-- /grid item -->
    @endsection
