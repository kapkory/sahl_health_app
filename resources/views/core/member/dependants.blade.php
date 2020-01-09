@extends('layouts.sahl')
@section('styles')
    <link rel="stylesheet" href="{{ url('drift/assets/modules/intlTelInput/intlTelInput.min.css') }}">

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('frontend/assets/background.jpg') }}");
        }
    </style>
    <style>
        .iti-flag {background-image: url("{{ url('drift/assets/modules/intlTelInput/img/flags.png') }}");}

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            .iti-flag {background-image: url("{{ url('drift/assets/modules/intlTelInput/img/flags@2x.png') }}");}
        }
        .intl-tel-input{
            padding-top: 17px !important;
        }
        .selected-flag{
            padding-top: 20px !important;
            padding-left: 10px !important;

        }
        .intl-tel-input .flag-container{
            padding-left: 10px !important;
        }
        #phone_number{
            padding-left: 40px !important;
        }
    </style>
{{--    <script src="{{ url('drift/assets/modules/intlTelInput/intlTelInput.js') }}"></script>--}}

@endsection
@section('content')
    <div class="container-fluid bg-dark-myimg pb-md-5 mb-md-5 ">
        <div class="col-md-10 mx-auto">
            <div class="container py-md-5">
                <div class="rounded">
                    <div class="row py-4">
                        <div class="col-md-8 pt-md-3 mt-md-3">
                            <h3 class="text-light">
                                <b>ACCESS AFFORDABLE HEALTHCARE <br>&nbsp;&nbsp;&nbsp; ANYWHERE, ANYTIME</b>
                            </h3>
                            <p class="text-light pt-3 mt-3 lead">
                                Save up to <b style="font-size: 26px">20%</b> at the best <br>Healthcare providers near
                                you!
                            </p>
                        </div>
                        <div class="col-md-4 pt-md-3 mt-md-3">
                            <i
                                class="fa fa-heartbeat text-light fa-5x float-md-right"
                                aria-hidden="true"
                            ></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 mx-auto">
        <div class="container mb-4">
            <div id="nominate_dependant_form" class="form_cont container py-md-5 bg-light shadow-lg rounded mb-5">
                <div class="col-11 mx-auto">
                    <div class="col-5 col-md-2 mx-auto">
                        <img src="{{ url('frontend/assets/user.png') }}" alt="User Logo" width="100%" class="user_image mb-2"/>
                    </div>
                    <h5 class="text-center">
                        <caption>
                         Would you like to nominate your <br>
                            dependant?
                        </caption>
                    </h5>

                        <div class="row my-2">
                            <div class=" col-md-6 form-group">
                                <div class="custom-control custom-radio custom-control-inline float-right">
                                    <input checked type="radio" class="custom-control-input" id="nominateDependant" name="nominate" value="1">
                                    <label class="custom-control-label" for="nominateDependant">Yes</label>
                                </div>
                            </div>

                            <div class=" col-md-6 form-group">
                                <!-- Default inline 2-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="dontNominate" name="nominate" value="0">
                                    <label class="custom-control-label" for="dontNominate">No</label>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 mx-auto">
                            <div class="row">

                                <div class="col p-2 my-2 mx-1 text-center">
                                    <input type="button" onclick="return nominateDependant()" value="Continue" style="background-color: orangered; color: white !important;" class="btn btn-warning pl-4 pr-4 text-light submit-btn"/>
                                </div>
                            </div>
                        </div>

                </div>
            </div>



            <div style="display: none" id="add_dependant_form" class="form_cont container py-md-5 bg-light shadow-lg rounded mb-5">
                <div class="col-11 mx-auto">
                    <div class="col-5 col-md-2 mx-auto">
                        <img src="{{ url('frontend/assets/user.png') }}" alt="User Logo" width="100%" class="user_image mb-2"/>
                    </div>
                    <h5 class="text-center">
                        <caption>
                            Great! We are just a couple of steps away from finalising your plan. <br>
                            Please provide your dependants
                        </caption>
                    </h5>
                    <form id="member_register" action="{{ url('member/dependants/add') }}" method="post" class="py-md-3 px-md-4 ajax-post">

                    <div class="row my-2">
                        @isset($_GET['added'])
                        <p class="text-center text-success" style="font-weight: 600">Dependant has been successfully added</p>
                        @endisset

                            <div class="row my-2">
                                <div class="p-2 col-md-4 form-group">
                                    <input type="text" required name="first_name" placeholder="Dependant First Name" class="my_input col-md border-0 rounded m-3 p-2"/>
                                </div>

                                @csrf
                                <div class="p-2 col-md-4 form-group">
                                    <input type="text" required name="last_name" placeholder="Dependant Last Name" class="my_input col-md border-0 rounded m-3 p-2"/>
                                </div>

                                <div class="p-2 col-md-4 form-group">
                                    <input type="text"  name="phone_number" placeholder="Dependant Mobile Number" class="my_input col-md border-0 rounded m-3 p-2"/>
                                </div>
                                <input type="hidden" name="add_dependant" value="0">

                                @php
                                    $identifications = \App\Models\Core\Identification::where('is_provider',0)->get();
                                @endphp
                                <div class="col-md-4 form-group">
                                    <select name="identification_type" class="form-control p-2 m-3 custom-select">
                                        <option value="">Select Identification Type</option>
                                        @foreach($identifications as $identification)
                                            <option value="{{ $identification->id }}">{{ $identification->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class=" col-md-4 form-group">
                                    <input type="text"  name="identification_number" placeholder="Identification Number" class="my_input col-md border-0 rounded m-3 p-2"/>
                                </div>

                                <div class="col-md-4 form-group">
                                    <select name="relationship_type" class="form-control p-2 m-3 custom-select">
                                        <option value="">Select Type of Relationship</option>
                                        <option value="child">Child</option>
                                        <option value="spouse">Spouse</option>
                                        <option value="parent">Parent</option>
                                        <option value="grand parent">Grand Parent</option>
                                        <option value="grand children">Grand Children</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <a href="#" onclick="return addDependant()" class="text-success">Add Dependants</a>

                            </div>


                    </div>

                    <div class="col-md-6 mx-auto">
                        <div class="row">

                            <div class="col p-2 my-2 mx-1 text-center">
                                <input type="submit" value="Proceed to Payment  >>" style="background-color: orangered; color: white !important;" class="btn btn-warning pl-4 pr-4 text-light submit-btn"/>

                                @isset($_GET['added'])
                                    <a href="{{ url('member/payment') }}" class="btn btn-info m-2">Skip Without adding Dependant</a>
                                @endisset
                            </div>
                        </div>
                    </div>
                    </form>
                    {{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            // localStorage.removeItem('nominate_dependant');
            if (localStorage.getItem("nominate_dependant") != null) {
                $('#nominate_dependant_form').hide();
                $('#add_dependant_form').show();
            }
        });
        function nominateDependant() {
            localStorage.setItem('nominate_dependant','yes');
            let radio_val = $('input[name="nominate"]:checked').val();
            // console.log('radio value is '+radio_val);

             if(radio_val ==1)
             {
               $('#nominate_dependant_form').hide();
               $('#add_dependant_form').show();
             }
             else
             {
                 window.location.href = "{{ url('member/payment') }}";
             }
        }

        function addDependant() {
         $('input[name="add_dependant"]').val(1);
         $('.ajax-post').trigger('submit');
        }
    </script>

@endsection
