@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/about.jpg') }}") !important;
            max-height: 220px;
            object-fit: cover;
        }

        @media screen and (max-width: 767px) {
            .mb_about {
                margin-top: 10px !important;
            }
        }
        @media screen and (min-width: 768px) {
            .mb_about {
                margin-top: -110px !important;
            }
        }
    </style>

@endsection
@section('content')
   <div class="row">
       <div class="container-fluid bg-dark-myimg md-5 md-5 " style="background: rgba(51, 80, 98, 0.7);">
           <div class="col-md-10 mx-auto" >
               <div class="container py-md-5" >
                   <div class="rounded">
                       <div class="row py-4">
                           <div class="col-md-8 pt-md-3 mt-md-3" >

                           </div>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>


   <div class="row" style="background-color: white">
       <div class="container-fluid">
           <div class="col-10 offset-1">
               <div class="pd-content">
                   <h2 class="pt-4" style="text-transform: capitalize; color: #335062">{{ $institution->name }}</h2>
                   <p>
                         {{ $institution->intro }}
                   </p>
               </div>
           </div>

           <div class="row p-3" style="background: #F5F5F5">
               <div class="col-md-5 col-md-offset-1 offset-1">
                   <h4 class="pt-2"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Visiting Hours</h4>

                   <ul style="list-style-type: none">
                   <li>Morning 11.00 – 12.00</li>
                   <li> Evening 17.00 – 19.00</li>
                  </ul>

                   <h4 class="pt-2"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Emergencies</h4>

                   <ul style="list-style-type: none">
                       <li>The department operates 24/7.</li>
                       <li>Your life matters.</li>
                   </ul>


                   <h4 class="pt-2"><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Contact Us</h4>

                   <ul style="list-style-type: none">
                       <li>  {{ @$institution->user->phone_number }}</li>
                       <li> {{ @$institution->user->email }}</li>
                   </ul>
               </div>
               <div class="col-md-6">
                   <div class="row">
                       <div style="margin-left: 40% !important;">
                           <img height="140" src="{{  ($institution->logo_url) ? url($institution->logo_url) : url('sahl/assets/image/logo.png') }}">
                       </div>
                   </div>
                   <div class="row pt-2">
                       <div class="col-md-9 offset-1 ">
                           <div class="post-block">
                               <!-- post classic block -->
                               <div class="post-carousel">
                                   <div class="owl-post owl-carousel owl-theme">
                                       <!-- owl-item -->
                                       <div class="item">
                                           <div class="post-img">
                                               <img src="{{ ($institution->featured_image) ? url($institution->featured_image) : url('frontend/assets/images/default-img-400x240.jpg') }}" alt="Spacely - Realtor Directory & Listing Bootstrap Template" class="img-fluid">
                                           </div>
                                       </div>
                                       @foreach($institution->institutionImages as $image)
                                       <!-- owl-item -->
                                       <div class="item">
                                           <div class="post-img">
                                               <img src="{{ url($image->path) }}" alt="{{ $institution->name }}" class="img-fluid">
                                           </div>
                                       </div>
                                       @endforeach
                                   </div>
                               </div>
                               <!-- post content start -->
                           </div>

                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>

    <div class="row" style="background: rgba(196, 196, 196, 0.2); top: 0px">
        <div class="container-fluid" style="padding-top: 100px">
            <div class="col-10 offset-1">
               <div class="row">
                   <div class="col-md-4 col-sm-12">
                       <h3 style="color: #335062; border-bottom-style:  solid;border-bottom-color: #F07A3B;">General Services</h3>
                       <ul style="list-style-type: disc">
                           <li> Casualty A&E</li>
                           <li> Inpatient</li>
                           <li> Pharmacy</li>
                           <li> Laboratory</li>
                           <li> Surgery</li>
                           <li> Radiology (MRI, CT Scan, X-Ray, Ultrasound) */</li>
                       </ul>
                   </div>

                   <div class="col-md-4 col-sm-12">
                       <h3 style="color: #335062;border-bottom-style:  solid; border-bottom-color: #F07A3B;">Other Services</h3>
                       <ul style="list-style-type: disc">
                           <li> Gynecology and Pelvic Health Clinic</li>
                           <li> Pregnancy Care</li>
                           <li> Psychosocial Support</li>
                           <li> Ear, Nose and Throat Care</li>
                           <li> Physiotherapy</li>
                           <li> Dental Care</li>
                           <li> Counseling/Psychotherapy</li>
                       </ul>
                   </div>


                   <div class="col-md-4 col-sm-12">
                       <h3 style="color: #335062;border-bottom-style:  solid; border-bottom-color: #F07A3B;">Specialized Services</h3>
                       <ul style="list-style-type: disc">
                           <li> Cancer Care</li>
                           <li> Diabetes Care</li>
                           <li> Nephrology/Renal Care </li>
                           <li> Orthopedic Care</li>
                           <li> Ophthalmology (Eye Clinic)</li>
                           <li> Cardiac Centre/Cath Lab </li>
                           <li> Breast Clinic </li>
                       </ul>
                   </div>
               </div>

            </div>
        </div>
    </div>



@endsection
