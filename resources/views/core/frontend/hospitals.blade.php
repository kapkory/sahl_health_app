@extends('layouts.sahl')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                <!-- breadcrumb start -->
                <div class="custom-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Hospitals</li>
                        </ol>
                    </nav>
                </div>
                <!-- breadcrumb close -->
            </div>
        </div>
    </div>
    <div class="space-lg space-md space-xs">
        <div class="container">
            <div class="row">


                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">

                    <div class="row">
                        @foreach($hospitals as $hospital)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <!-- listing block start -->
                                <div class="listing-block">
                                    <div class="listing-img">
                                        <a href="{{ url('institution/'.$hospital->slug) }}">
                                            <img src="{{ ($hospital->featured_image) ? url($hospital->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="Spacely - Realtor Directory & Listing Bootstrap Template" class="img-fluid"></a>

                                        @if($hospital->discount > 0)
                                            <div class="listing-badge">Discount {{ $hospital->discount }}%</div>
                                        @endif
                                        <div class="like-icon"></div>
                                    </div>
                                    <div class="listing-content">
                                        <div class="listing-content-head">
                                            <h3 class="listing-content-head-title"> <a href="{{ url('institution/'.$hospital->slug) }}">Heading for Office Space Title</a></h3>
                                            <p class="listing-content-head-text">Nairobi, Kenya</p>
                                        </div>

                                        <div class="listing-content-meta">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                                    <span class="value">{{ @$hospital->institutionLevel->name }}</span>
                                                </div>
                                            </div>
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
