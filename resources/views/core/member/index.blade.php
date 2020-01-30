@extends('layouts.admin')
@section('title','')

@section('content')
    <style>
        .dt-content {
            padding: 1.4rem 3.2rem;
        }
        .dt-page__header {
            margin-bottom: 1.4rem;
        }
    </style>

    <style>
        .review-content-rating {
            color: #ff9703;
            position: relative;
            display: flex;
            align-items: center;
        }
        .review-content-rating .star::before, .review-content-rating .star.half::after {
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            content: '\f005';
            display: block;
        }
    </style>
    <!-- Grid Item -->
    <div class="col-xl-12">
       <div class="row">
           <div class="col-md-3 col-6"><!-- Card -->
               <div class="dt-card" style="background-color: #7BB37D;border-radius: 10px;"><!-- Card Body -->
                   <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >

                       <div class="media">
                           <i class="icon icon-revenue-new text-white icon-5x mr-xl-5 mr-3 align-self-center"></i><!-- Media Body -->
                           <div class="media-body">
                               <p class="mb-1 h1 text-white">Ksh <br>{{ @number_format($data['savings'],2) }}</p>
                               <span class="d-block text-black-50">Savings</span>
                           </div><!-- /media body -->
                       </div><!-- /media -->
                   </div><!-- /card body -->
               </div><!-- /card -->
           </div>

           <a href="{{ url('member/visits') }}" class="col-md-3 col-6"><!-- Card -->
               <div class="dt-card" style="background: rgba(196, 196, 196, 0.42);border-radius: 10px;"><!-- Card Body -->
                   <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >

                       <div class="media">
                           <img src="{{ url('sahl/assets/image/hospital.png') }}" alt="hospital">
                           <div class="media-body">
                               <p class="mb-1 h1 text-center" style="color: #335062">{{ $data['visits'] }}</p>
                               <span class="d-block text-center" style="color: #335062">&nbsp;&nbsp;&nbsp;Hospital Visits</span>
                           </div><!-- /media body -->
                       </div><!-- /media -->
                   </div><!-- /card body -->
               </div><!-- /card -->
           </a>

           <div class="col-md-3 col-6"><!-- Card -->
               <div class="dt-card" style="background-color: #335062;border-radius: 10px;"><!-- Card Body -->
                   <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4">

                       <div class="media">
                           <img src="{{ url('sahl/assets/image/current-plan.png') }}" alt="hospital">
                           <div class="media-body">
                               @if($memberPackage)
                               <p class="mb-1 h1 text-white text-center">{{ @$memberPackage->package->name }}</p>
                                   @if($memberPackage->ends_at)
                                       <p class="text-white text-center">
                                           Expires on {{ $memberPackage->ends_at }}
                                       </p>
                                   @else
                                     &nbsp; <a class="btn btn-info btn-sm rounded-2" style="font-size: 13px" href="{{ url('member/payment') }}">Buy <b>Package</b></a>
                                   @endif
                               @else
                                   &nbsp; <a class="btn btn-primary btn-sm rounded-0" style="font-size: 13px" href="{{ url('complete-registration?type=email') }}">Choose a Membership Package</a>

                               @endif
                                   <span class="d-block text-white text-center">Current Plan</span>
                           </div><!-- /media body -->
                       </div><!-- /media -->
                   </div><!-- /card body -->
               </div><!-- /card -->
           </div>

           <a href="{{ url('member/referrals') }}" class="col-md-3 col-6"><!-- Card -->
               <div class="dt-card" style="background: #F07A3B; border-color:#F07A3B; border-radius: 10px;box-sizing: border-box;"><!-- Card Body -->
                   <div  class="dt-card__body p-xl-8 py-sm-8 py-6 px-4" >

                       <div class="media">
                           <img src="{{ url('sahl/assets/image/referrals.png') }}" alt="hospital">
                           <div class="media-body">
                               <p class="mb-1 h1 text-center" style="color: #335062">{{ $data['referrals'] }}</p>
                               <span class="d-block text-center" style="color: #335062">&nbsp;&nbsp;User <br>&nbsp;Referred</span>
                           </div><!-- /media body -->
                       </div><!-- /media -->
                   </div><!-- /card body -->
               </div><!-- /card -->
           </a>
       </div>

            <div class="card">
                <div class="card-title pl-4 pt-3">
                    Favorite Hospitals
                </div>
                <div class="row mt-3">
            @if(count($favorite_institutions) > 0)
                @foreach($favorite_institutions as $institution)
                    <!-- Grid Item -->
                        <div class="mobile_disp  col-sm-6 col-md-4 col-xl-3">

                            <!-- Card -->
                            <div class="card">

                                <!-- Slider -->
                                <div class="dt-slider">

                                    <!-- Slider Header -->
                                    <div class="dt-slider__header">
                                        <span class="badge bg-orange text-white text-uppercase">{{ $institution->discount.'%' }}</span>
                                        <div class="dt-checkbox dt-checkbox-icon dt-checkbox-only">
                                            <input id="checkbox-1" type="checkbox" onclick="runCustomPlainRequest('{{ url("member/institutions/favorite/delete/".$institution->id) }}',null,'Remove {{ $institution->name }} Hospital as Favorite Hospital')">
                                            <label style="background-color: red" class="font-weight-light dt-checkbox-content" for="checkbox-1">
                                                <span class="unchecked"><i class="icon icon-heart-o text-white"></i></span>
                                                <span class="checked"><i class="icon icon-heart text-white"></i></span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /slider header -->


                                    <div class="owl-carousel owl-theme">
                                        <img class="card-img-top" style="max-height: 150.25px;object-fit: cover " src="{{ ($institution->featured_image) ? url($institution->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="Hospital">
                                    </div>

                                </div>
                                <!-- /slider -->

                                <!-- Card Body -->
                                <div class="card-body" style="padding: 3px">
                                    <!-- Card Title-->
                                    <button class="badge btn" style="background-color: #335062; color: white">Nairobi</button>

                                    <span>{{ @$institution->institutionLevel->name }}</span>

                                    <a href="{{ url('institution/'.$institution->slug) }}">
                                        <h3 class="mb-0">{{ $institution->name }}</h3>
                                    </a>
                                    <div class="py-0 review-content-rating" >
                                        @for($i=0; $i<@\App\Models\Core\Institution::getInstitutionRatingCount($institution->id); $i++)
                                            <span class="star" style="float: right; color: #7BB37D !important;"></span>
                                        @endfor
                                    </div>
                                    <!-- Card Title-->

                                </div>
                                <!-- /card body -->

                            </div>
                            <!-- /card -->
                        </div>
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


        $('#btnGenerateToken').click(function () {
            let url = "{{ url('member/generate-token?_token='.csrf_token()) }}";
          $.post(url).done(function (response) {
              console.log(response.message);
              toastr.success(response.message);
              $('#btnGenerateToken').hide();

          })
        });


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
