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
                </div>
                <!-- /grid item -->
        @endforeach
    @endisset
    </div>

    @endsection
