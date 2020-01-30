@extends('layouts.sahl')
@section('content')

    <div class="row ">
        <div class="container-fluid">
            <div class="row" style="background-image: url({{ url('sahl/assets/image/hospital-background.svg') }}); height: 150px">

                    <div class="col-md-8 col-sm-12 offset-md-3">
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

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-3">
                    <!-- filter btn start -->
{{--                   <div class="row">--}}
                        <form class="row" method="post" action="{{ url('search') }}">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="county" style="background: rgba(196, 196, 196, 0.24);" class="select2 form-control custom-select">
                                        <option>Search By County</option>
                                        @foreach($counties as $county)
                                            <option value="{{ $county->id }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="level" style="background: rgba(196, 196, 196, 0.24);" class="select2 form-control custom-select">
                                        <option value="">Level</option>
                                        @foreach($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="service" style="background: rgba(196, 196, 196, 0.24);" class="select2 form-control custom-select">
                                        <option value="">Service</option>
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <button style="background-color: #335062" class="btn text-white"><i class="fa fa-search text-white"></i>&nbsp;Search</button>
                            </div>
                        </form>
{{--                   </div>--}}
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">

                    <div class="row mobile1">
                        <?php
                        $colors = ['#7BB37D','#F07A3B','#335062','#335062','#7BB37D','#F07A3B'];
                        ?>
                        @foreach($hospitals as $featured_hospital)
                            <div class="mobile_disp col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                <!-- listing block start  -->
                                <div class="listing-block " style="padding-bottom: 1px">
                                    <div class="listing-img">
                                        <a href="{{ url('institution/'.$featured_hospital->slug) }}">
                                            <img style="object-fit: cover;height: 168px" src="{{ ($featured_hospital->featured_image) ? url($featured_hospital->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="{{ $featured_hospital->name }}" class="img-fluid  lazy">
                                        </a>
                                        <div class="listing-badge"> {{ $featured_hospital->discount }}%</div>

                                    </div>

                                    <div class="listing-content" style="padding-left: 10px; padding-top: 5px; padding-bottom: 5px">
                                        <div class="listing-content-head">
                                            <button class="btn badge mobile_padding" style="color: white; background-color: {{ @$colors[$loop->index] }}">Nairobi</button>
                                            <h3 class="listing-content-head-title mobile_heading">
                                                <a href="{{ url('institution/'.$featured_hospital->slug) }}">{{ \Illuminate\Support\Str::limit($featured_hospital->name,23,'...') }}</a>
                                            </h3>

                                            <div class="listing-content-head-text py-0">{{ @$featured_hospital->institutionLevel->name }} </div>
                                            {{--                                               <small class="lable text-muted" style="padding-left: 10px;"></small>--}}
                                            <div class="py-0 review-content-rating  " >
                                                @for($i=0; $i<@$featured_hospital->getRatingCount(); $i++)
                                                    <span class="star" style="float: right; color: #7BB37D !important;"></span>
                                                @endfor
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <!-- listing block close  -->
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

    <script>
        $('select[name="county"] [value="47"]').attr('selected','selected');
    </script>
    @endsection
