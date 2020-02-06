@extends('layouts.sahl')
@section('content')
    <style>
        .item{
            background: #FFFFFF;
            border: 1px solid rgba(51, 80, 98, 0.5);
            box-sizing: border-box;
            box-shadow: 0px 6px 9px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .package_button{
            color: white;
            background-color: #F07A3B;
            border-color: #F07A3B;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
         }
        @media screen and (max-width: 768px) {
            .hero-search-area-caption-text {
                color: black;
            }
            .mobile_packages{
                width: 100% !important;
            }
            .hosp_title{
                display: none;
            }
        }
        @media screen and (min-width: 768px) {
            .sahl_home{
                min-height:300px;
                /*max-height: 475px;*/
            }

            .listing-content-head-title{
                display: none;
            }

        }

        .hp_service{
            font-family: Montserrat;
            /*font-style: normal;*/
            /*line-height: 26px;*/
            /*text-transform: capitalize;*/

            /*color: rgba(13, 39, 55, 0.97);*/
        }
        .hp_heading{
            color: rgb(113, 113, 113) !important;
            flex: 1 1 0% !important;
            line-height: 20px !important;
            max-height: 20px !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            margin-left: 6px !important;
        }
    </style>
<!-- header close -->
   <div class="row sahl_home" style="background: linear-gradient(89.88deg, rgba(15, 21, 26, 0.52) -2.71%, rgba(51, 80, 98, 0.15) 99.7%), rgba(240, 122, 59, 0.41);">

            <img style="width: 100% !important;max-height: 475px; object-fit: cover;" src="{{ url('sahl') }}/assets/image/slider-1.svg" alt="Sahl Health slider" >

             <!-- hero serach area start  -->
             <div class="hero-search-area">
                 <div class="row">
                     <div class="offset-xl-1 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                         <div class="hero-search-area-caption">
                             <h1 class="hero-search-area-caption-title" style="font-weight: 400">Now, Medical bills have no claim on your health and wellness.</h1>
                             <p class="hero-search-area-caption-text">
                                 Find the best hospitals and wellness clinics near you and save up to 20%
                                 all year long with My Sahl Health Plan
                             </p>
                         </div>
                         <div class="hero-search-area-form">
                             <a href="#packages_page"  class="btn btn-primary " style="background-color: #F07A3B; border-color:#F07A3B;border-radius: 10px;">Start My Sahl Health Plan</a>
                         </div>
                         <div class="row">
                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                 <p class="hero-search-area-form-small-text pb-3">
                                     <a style="text-decoration: underline" href="{{ url('hospitals') }}"> Find Discounts Nearby</a>
                                 </p>
                             </div>
                         </div>
                     </div>
{{----}}
                 </div>
             </div>
             <!-- hero serach area close  -->
{{--         </div>--}}

</div>

    <div class="row clearfix" style="background-color:#335062;">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 pt-4">
            <h2 class="section-heading-title text-center" style="color: white">
                My Sahl Health Plan
            </h2>
        </div>
        <div class="col-md-10 col-sm-12 offset-md-1">
            <p style="text-align: center;color:#FFFFFF; font-family: Montserrat;font-style: normal;font-weight: normal;">
                The best healthcare costs an arm and a leg, but a Sahl Health Plan means <br> you never have to get to that point.
            </p>
        </div>
    </div>
    <div class="clearfix">

    </div>
    <div class="row" style="background-color:#335062;" id="packages_page">
        <div class="container-fluid my-3" >
            <div class="mobile_packages col-sm-12 col-md-8 offset-md-2">
                <div class="testimonial-carousel">
                    <div class="owl-carousel owl-theme owl-testimonial">
                        @foreach($packages as $package)
                        <div class="item ">
                            <!-- testimonial start  -->
                            <div class="testimonial-block">
                                <div class="testimonial-content pt-3">
                                    <h5>{{ $package->name }}</h5>

                                    <img height="90" style="text-align: center !important; display: inline-flex; max-width: 90px" class="lazy" src="{{ ($package->icon) ? url($package->icon) :url('sahl/assets/image/individual.svg') }}" alt="3 Members Plan">

                                    <div>
                                        <h4>
                                            Ksh {{ number_format($package->cost,2) }}<br>
                                            <small>Per Year</small>
                                        </h4>

                                    </div>
                                    <div class="testimonial-content-text">
                                        <p>
                                            {{ $package->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center pb-3">
                                <button onclick="setPackage({{ $package->id }})" class="btn package_button m-2 " style="color: white;">Start My Plan</button>
                            </div>
                            <!-- testimonial close  -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="row">
        <div class="container-fluid">
            <div class="text-center my-5 ">
                <h3 class="section-heading-title " style="color: #335062">
                    Looking for Something Else?
                </h3>
                <h5 style="color: #335062;">
                    We have over 500 healthcare providers at your service countrywide.
                </h5>
            </div>
            <div class="row " >
                <div class="container-fluid offset-md-2 col-md-9 ">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 ">
                            <a href="{{ url('hospitals') }}">
                                <div class="card  py-5">
                                    <div class="text-center">
                                        <img class="lazy" src="{{ url('sahl/assets/image') }}/nearby-hospital.svg" alt="Find A Hospital Near You">
                                        <h4>Find A Hospital<br> Near You</h4>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mx-lg-2">
                            <div class="card py-5">
                                <div class="text-center">
                                    <img class="text-center lazy" src="{{ url('sahl/assets/image') }}/compare-charges.png" alt="Compare Hospital Charges">
                                    <h4>Compare Hospital Charges</h4>
                                </div>
                            </div>


                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mx-lg-1">
                            <div class="card  py-5 ">
                                <div class="text-center">
                                    <img class="lazy" src="{{ url('sahl/assets/image') }}/wellness.png" alt="Talk to a Wellness Expert">
                                    <h4>Access Service <br> Discounts</h4>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-11" style="border-style: none;background: linear-gradient(358.96deg, rgba(3, 3, 3, 0.97) 0.63%, rgba(255, 255, 255, 0) 98.25%);">
                    <img class="lazy" src="{{ url('sahl') }}/assets/image/inpatient.svg" alt="Save More at Sahl Health" style="height: 350px;object-fit: cover; border-radius: 0px; max-width: 100%" >
                    <div class="post-imgoverlay-content">
                        <h4 class="post-title">
                            <a href="#" class="title">Save up to 20% on on outpatient bills</a>
                        </h4>
                        <div class="post-meta">
                            <div class="meta">
                                <button class="btn package_button m-2 " style="color: white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">Find More</button>

                            </div>
                            <!-- postmeta close -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-11" style="border-style: none;background: linear-gradient(358.96deg, rgba(3, 3, 3, 0.97) 0.63%, rgba(255, 255, 255, 0) 98.25%);">
                    <img class="lazy" src="{{ url('sahl') }}/assets/image/outpatient.svg" alt="Save More at Sahl Health" style="height: 350px; max-width: 100%; object-fit: cover; border-radius: 0px" >
                    <div class="post-imgoverlay-content">
                        <h4 class="post-title">
                            <a href="#" class="title">Save up to 20% on on outpatient bills</a>
                        </h4>
                        <div class="post-meta">
                            <div class="meta">
                                <button class="btn package_button m-2 " style="color: white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">Find More</button>

                            </div>
                            <!-- postmeta close -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-11" style="border-style: none;background: linear-gradient(358.96deg, rgba(3, 3, 3, 0.97) 0.63%, rgba(255, 255, 255, 0) 98.25%);">
                    <img class="lazy" src="{{ url('sahl') }}/assets/image/save-more.svg" alt="Save More at Sahl Health" style="height: 350px;max-width: 100%;object-fit: cover; border-radius: 0px" >
                    <div class="post-imgoverlay-content">
                        <h4 class="post-title">
                            <a href="#" class="title">Save up to 20% on on outpatient bills</a>
                        </h4>
                        <div class="post-meta">
                            <div class="meta">
                                <button class="btn package_button m-2 " style="color: white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">Find More</button>

                            </div>
                            <!-- postmeta close -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


{{--    <div class="row">--}}
{{--        <div class="container-fluid" style="background: #F5F5F5">--}}
{{--            <div class="row mt-2">--}}
{{--                <div class="col-md-5 offset-md-1" style="float: right">--}}
{{--                    <div class="col-md-12" style="padding-top: 15%">--}}
{{--                        <div >--}}
{{--                            <h4 style="text-align: center">Solutions for all teams sizes</h4>--}}

{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut enim quis leo tincidunt tempor at sit amet eros. Nullam consectetur dignissim erat se--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="row" style="padding-left: 20px">--}}
{{--                           <ul style="list-style-type: none; padding-right: 10px">--}}
{{--                               <li> <i class="fa fa-check-circle" ></i>--}}
{{--                                   Lorem ipsum dolor sit amet, consectetu Curabitur ut--}}
{{--                               </li>--}}

{{--                               <li> <i class="fa fa-check-circle" ></i>--}}
{{--                                   Lorem ipsum dolor sit amet, consectetu Curabitur ut--}}
{{--                               </li>--}}

{{--                               <li>--}}
{{--                                   <i class="fa fa-check-circle" ></i>--}}
{{--                                   Lorem ipsum dolor sit amet, consectetu Curabitur ut--}}
{{--                               </li>--}}

{{--                           </ul>--}}
{{--                            <a href="#" class="btn" style="background: #F07A3B;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);border-radius: 8px; color: white">Explore The Packages</a>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div style="padding: 0px !important;" class="col-md-6 mt-4">--}}
{{--                    <img style="object-fit: cover; width: 100%; max-height: 450px" src="{{ url('sahl/assets/image/sahl-health-user.svg') }}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="row">
        <div class="container-fluid">
            <div class="text-center mt-5">
                <h3 class="section-heading-title " style="color: #335062">
                    Popular Service Providers
                </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container-fluid">
{{--            <div class="row">--}}
{{--                <div class=" col-12 pt-4">--}}
{{--                    <h3 class="section-heading-title text-center">--}}
{{--                       Popular Service Providers--}}
{{--                    </h3>--}}
{{--                </div>--}}
{{--            </div>--}}
               <div class="col-sm-12">
                   <div class="row mobile1 py-3 px-5">
                   <?php
                     $colors = ['#7BB37D','#F07A3B','#335062','#335062','#7BB37D','#F07A3B'];
                    ?>
                   @foreach($featured_hospitals as $featured_hospital)
                       <div class="mobile_disp col-lg-4 col-md-5 col-sm-6 col-xs-6">
                           <!-- listing block start  -->
                           <div class="listing-block p-1">
                               <div class="listing-img">
                                   <a href="{{ url('institution/'.$featured_hospital->slug) }}">
                                       <img style="object-fit: cover;height: 168px" src="{{ url($featured_hospital->featured_image) }}" alt="{{ $featured_hospital->name }}" class="img-fluid  lazy">
                                   </a>
                                   <div class="listing-badge"> {{ $featured_hospital->discount }}%</div>

                               </div>

                               <div class="listing-content" style="padding-left: 10px; padding-top: 5px; padding-bottom: 5px">
                                   <div class="listing-content-head">

                                       <div class="review-content-rating" style="right: 10px !important;" >
                                           <button class="btn badge mobile_padding btn-outline-dark" >{{ ($featured_hospital->country) ? $featured_hospital->country->name: 'Nairobi' }}</button>
                                            <div class="col-md-7 col-sm-6 col-xs-6" style="overflow: hidden; text-overflow: ellipsis">
                                                <a style="font-family: Montserrat;font-style: normal;font-weight: bold;font-size: 18px;line-height: 22px; color: #335062" href="{{ url('institution/'.$featured_hospital->slug) }}" class="hosp_title">{{ \Illuminate\Support\Str::limit($featured_hospital->name,23,'...') }}</a>

                                            </div>
                                           <span class="star" style="float: right !important; padding-right: 10px!important; color: #F07A3B !important;"></span> <span style="color:  rgba(13, 39, 55, 0.97)">4.2</span>
                                       </div>

                                       <h3 class="listing-content-head-title" >
                                           <a href="{{ url('institution/'.$featured_hospital->slug) }}">{{ \Illuminate\Support\Str::limit($featured_hospital->name,23,'...') }}</a>
                                       </h3>

                                       <span class="hp_service">
                                           In Patient and Out Patient services
                                       </span>

                                       <div class="listing-content-head-text py-0">{{ @$featured_hospital->institutionLevel->name }} </div>
{{--                                               <small class="lable text-muted" style="padding-left: 10px;"></small>--}}
{{--                                       <div class="py-0 review-content-rating  " >--}}
{{--                                           @for($i=0; $i<@$featured_hospital->getRatingCount(); $i++)--}}
{{--                                               <span class="star" style="float: right; color: #7BB37D !important;"></span>--}}
{{--                                           @endfor--}}
{{--                                       </div>--}}
                                   </div>


                               </div>

                           </div>

                           <!-- listing block close  -->
                       </div>

                   @endforeach

               </div>
                   <div class="container-fluid my-3">
                       <div class="text-center">
                           <a href="{{ url('hospitals') }}" class="btn package_button" >View All</a>
                       </div>
                   </div>
           </div>
        </div>
    </div>


    <div class="row">
        <div class="container-fluid">
            <div class="row mt-2">
                <div style="padding: 0px !important;" class="col-md-6 mt-4">
                    <img style="object-fit: cover; width: 100%; max-height: 500px" src="{{ url('sahl/assets/image/contact-us.svg') }}">
                </div>
                <div class="col-md-6" style="float: right">
                    <div class="col-md-12">
                        <div class="mt-4">
                            <h4>Would prefer to get more information first?</h4>
                            <p>
                                Get in touch with our friendly staff 24/7
                            </p>
                        </div>
                        <div class="row">
                            @if (session('status'))
                                <div class="alert alert-success text-center">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="post" action="{{ url('contact-us') }}">
                                <div class="form-row m-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="text" name="name" class="form-control" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Your Email" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row m-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="text" name="phone" class="form-control" placeholder="Your Mobile" >

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="required" type="text" name="location" class="form-control" placeholder="Your Location">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" required="required"  placeholder="Write Message" cols="4" rows="6" class="form-control"></textarea>
                                            @csrf
                                        </div>

                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <button type="submit" class="btn" style="color: white; background: #F07A3B;border-radius: 10px;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function setPackage(package_id) {
      localStorage.setItem('package_id',package_id);
      window.location.href = "{{ url('register') }}";
    }
</script>

    @endsection
