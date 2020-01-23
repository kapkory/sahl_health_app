@extends('layouts.sahl')
@section('content')

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-4">--}}
{{--                <!-- breadcrumb start -->--}}
{{--                <div class="custom-breadcrumb">--}}
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active">Hospitals</li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--                <!-- breadcrumb close -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row ">
        <div class="container-fluid">
            <div class="row" style="background-image: url({{ url('sahl/assets/image/hospital-background.svg') }}); height: 150px">

                    <div class="col-md-8 offset-3">
                        <h4 class=" post-title" style="padding-top: 30px !important;color: white">
                            Check out our range of service providers <br> around the country
                        </h4>
                    </div>
            </div>
        </div>
    </div>
    <div class="space-lg space-md space-xs mt-3">
        <div class="container">
            <div class="row">


                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="row">
                        @foreach($hospitals as $hospital)
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <!-- listing block start -->
                                <div class="listing-block">
                                    <div class="listing-img">
                                        <a href="{{ url('institution/'.$hospital->slug) }}">
                                            <img src="{{ ($hospital->featured_image) ? url($hospital->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="{{ $hospital->name }}" class="img-fluid institution_image"></a>

                                        @if($hospital->discount > 0)
                                            <div class="listing-badge">Discount {{ $hospital->discount }}%</div>
                                        @endif
                                        <div class="like-icon" style="top:0px"></div>
                                    </div>

                                    <small class="lable text-muted" style="padding-left: 10px;">{{ @$hospital->institutionLevel->name }}</small>

                                    <div class="review-content-rating float-right pt-2">
                                        <span class="star" style="float: right"></span>
                                        <a href="{{ url('institution/'.$hospital->slug) }}" class="rating-review" style="margin-right: 15px">{{ @$hospital->getRatingCount() }}</a>
                                    </div>
                                    <div class="listing-content">
                                        <div class="listing-content-head">
                                            <h3 class="listing-content-head-title"> <a href="{{ url('institution/'.$hospital->slug) }}">{{ \Illuminate\Support\Str::limit($hospital->name,16,'...') }}</a></h3>
                                            <p class="listing-content-head-text">Nairobi, Kenya</p>
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
