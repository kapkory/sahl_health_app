@extends('layouts.admin')
@section('title','')

@section('content')
    <!-- Grid Item -->
    <div class="col-xl-12">
       <div class="row">
           <div class="col-md-3 col-6"><!-- Card -->
               <div class="dt-card"><!-- Card Body -->
                   <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">
                       <span class="badge badge-secondary badge-top-right">Savings</span><!-- Media -->
                       <div class="media">
                           <i class="icon icon-revenue-new icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                           <div class="media-body">
                               <p class="mb-1 h1">{{ @number_format($data['savings'],2) }}</p>
                               <span class="d-block text-light-gray">Ksh</span>
                           </div><!-- /media body -->
                       </div><!-- /media -->
                   </div><!-- /card body -->
               </div><!-- /card -->
           </div>

           <a href="{{ url('member/visits') }}" class="col-md-3">
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
           </a>


           <div class="col-md-3">
               <div class="dt-card p-2">
               @if($memberPackage)
                   <h3>Current Plan: <span class="text-success">{{ @$memberPackage->package->name }}</span></h3>
                   @if($memberPackage->ends_at)
                       Expires on {{ $memberPackage->ends_at }}
                   @else

                       <h4> Status:<span class="text-danger h4">  Unpaid</span></h4>
                       <a class="btn btn-info btn-sm rounded-0" style="font-size: 13px" href="{{ url('member/payment') }}">Pay <b>KES {{ $memberPackage->amount }}</b> for your Package</a>

                   @endif
               @else
                   <a class="btn btn-primary btn-sm rounded-0" style="font-size: 13px" href="{{ url('complete-registration?type=email') }}">Choose a Membership Package</a>
               @endif
               </div>
           </div>

           <div class="col-md-3 col-6"><!-- Card -->
               <div class="dt-card"><!-- Card Body -->
                   <div class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">
                       <span class="badge badge-success badge-top-right">Refer Friend</span><!-- Media -->
{{--                       <div class="media">--}}
{{--                           <div class="media-body">--}}
{{--                               <p class="mb-1 h1">{{ @number_format($data['savings'],2) }}</p>--}}
{{--                               <span class="d-block text-light-gray">Ksh</span>--}}
{{--                           </div><!-- /media body -->--}}
{{--                       </div><!-- /media -->--}}
                       <div class="form-group">
                           <label class="sr-only" for="subscription">Subject</label>
                           <input type="text" class="form-control" id="subscription" value="{{ auth()->user()->referral_code }}">
                           <button onclick="copyToClipboard()" style="background-color: #2ac174; border-color: #2ac174" class="btn btn-primary mt-3">Copy</button>
                       </div>

                       <div id="buttons">
                           Invite Via
                           <div class="d-flex flex-wrap align-items-center">

                               <!-- List -->
                               <ul class="dt-list dt-list-sm dt-list-cm-0 ml-auto">
                                   <li class="dt-list__item">
                                       <!-- Fab Button -->
                                       <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('member-register/'.auth()->user()->referral_code) }}" class="btn btn-outline-primary dt-fab-btn size-30">
                                           <i class="icon icon-facebook icon-xl"></i>
                                       </a>
                                       <!-- /fab button -->
                                   </li>

                                   <li class="dt-list__item">
                                       <!-- Fab Button -->
                                       <a href="mailto:?&subject=Invite Link&body={{ url('member-register/'.auth()->user()->referral_code) }}" class="btn btn-outline-primary dt-fab-btn size-30">
                                           <i class="icon icon-google-plus icon-xl"></i>
                                       </a>
                                       <!-- /fab button -->
                                   </li>

                                   <li class="dt-list__item">
                                       <!-- Fab Button -->
                                       <a href="https://twitter.com/intent/tweet?text={{ url('member-register/'.auth()->user()->referral_code) }}" class="btn btn-outline-primary dt-fab-btn size-30">
                                           <i class="icon icon-twitter icon-xl"></i>
                                       </a>
                                       <!-- /fab button -->
                                   </li>
                               </ul>
                               <!-- /list -->
                           </div>
                       </div>
                   </div><!-- /card body -->
               </div><!-- /card -->
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
                                    <div class="dt-slider__header" style="padding: 2px !important;">
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

    <script>
        function copyToClipboard() {
            var $temp = $("<input>");
            $("body").append($temp);
            let referral_link = "{{ url('member-register/'.auth()->user()->referral_code) }}";
            $temp.val(referral_link).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success('Referral url has been successfully copied')

        }
    </script>
    @endsection
