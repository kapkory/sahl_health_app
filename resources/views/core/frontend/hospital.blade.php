@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/hospital.jpg') }}") !important;
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
                               <h3 style="font-weight: 600; color: white">
                                   MP-Shah Hospital
                               </h3>
                               <h5 style="font-weight: 600; color: white">
                                   A leading private hospital in Kenya
                               </h5>
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
