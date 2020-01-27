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
                   <div class="row">
                       <div class="col-md-3">
                         <div class="form-group">
                             <select style="background: rgba(196, 196, 196, 0.24);" class="select2 form-control custom-select">
                                 <option>Search By Location</option>
                                 <option value="AK">Alaska</option>
                                 <option value="HI">Hawaii</option>
                                 <option value="WY">Wyoming</option>
                                 <option value="AL">Alabama</option>
                             </select>
                         </div>
                       </div>

                       <div class="col-md-3">
                           <div class="form-group">
                               <select style="background: rgba(196, 196, 196, 0.24);" class="select2 form-control custom-select">
                                   <option>Level</option>
                                   <option value="AL">Alabama</option>
                               </select>
                           </div>
                       </div>

                       <div class="col-md-3">
                           <div class="form-group">
                               <select style="background: rgba(196, 196, 196, 0.24);" class="select2 form-control custom-select">
                                   <option>Service</option>
                                   <option value="AK">Alaska</option>
                                   <option value="WY">Wyoming</option>
                                   <option value="AL">Alabama</option>
                               </select>
                           </div>
                       </div>
                   </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">

                    <div class="row mobile1">
                        @foreach($hospitals as $hospital)
                            <div class="mobile_disp col-lg-3">
                                <!-- listing block start -->
                                <div class="listing-block">
                                    <div class="listing-img">
                                        <a href="{{ url('institution/'.$hospital->slug) }}">
                                            <img src="{{ ($hospital->featured_image) ? url($hospital->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="{{ $hospital->name }}" class="img-fluid institution_image"></a>

                                        @if($hospital->discount > 0)
                                            <div class="listing-badge">{{ $hospital->discount }}%</div>
                                        @endif

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
