@extends('layouts.admin')

@section('title','Institutions')

@section('content')
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

    @isset($institutions)
        <div class="row">
        @foreach($institutions as $institution)
            <!-- Grid Item -->
                <div class="mobile_disp  col-sm-6 col-md-4 col-xl-3  ">

                    <!-- Card -->
                    <div class="card">

                        <!-- Slider -->
                        <div class="dt-slider">
                            <!-- Slider Header -->
                            <div class="dt-slider__header" style="padding: 2px !important;">
                                <span class="badge bg-orange text-white text-uppercase">{{ $institution->discount.'%' }}</span>

                                @if(App\User::hasFavoriteInstitution($institution->id,auth()->id()))
                                <div class="dt-checkbox dt-checkbox-icon dt-checkbox-only">
                                    <input id="checkbox-1" type="checkbox" onclick="runCustomPlainRequest('{{ url("member/institutions/favorite/".$institution->id) }}',null,'Mark {{ $institution->name }} Hospital as Favorite Hospital')">
                                    <label class="font-weight-light dt-checkbox-content" for="checkbox-1">
                                        <span class="unchecked"><i class="icon icon-heart-o text-white"></i></span>
                                        <span class="checked"><i class="icon icon-heart text-white"></i></span>
                                    </label>
                                </div>
                                    @endif
                            </div>
                            <!-- /slider header -->

                            <div class="owl-carousel owl-theme">
                                <img class="card-img-top"  style="max-height: 150.25px;object-fit: cover " src="{{ ($institution->featured_image) ? url($institution->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="Hospital">
                            </div>

                        </div>
                        <!-- /slider -->

                        <!-- Card Body -->
                        <div class="card-body" style="padding: 3px">
                            <span>{{ @$institution->institutionLevel->name }}</span>
                            <!-- Card Title-->
                            <button class="badge btn" style="background-color: #335062; color: white">Nairobi</button>

                            <h3 class="mb-0">{{ $institution->name }}</h3>
                            <!-- Card Title-->
                            <div class="py-0 review-content-rating" >
                                @for($i=0; $i<@$institution->getRatingCount(); $i++)
                                    <span class="star" style="float: right; color: #7BB37D !important;"></span>
                                @endfor
                            </div>
                        </div>
                        <!-- /card body -->

                    </div>
                    <!-- /card -->
                </div>
                <!-- /grid item -->
        @endforeach
    </div>
        <div class="row">
            {{ $institutions->links() }}
        </div>

    @endisset


    @endsection
