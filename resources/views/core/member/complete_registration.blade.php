@extends('layouts.frontend')
@section('styles')
    <link rel="stylesheet" href="{{ url('drift/assets/modules/intlTelInput/intlTelInput.min.css') }}">


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
    <script src="{{ url('drift/assets/modules/intlTelInput/intlTelInput.js') }}"></script>

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
            <div class="form_cont container py-md-5 bg-light shadow-lg rounded mb-5">
                <div class="col-11 mx-auto">
                    <div class="col-5 col-md-2 mx-auto">
                        <img src="{{ url('frontend/assets/user.png') }}" alt="User Logo" width="100%" class="user_image mb-2"/>
                    </div>
                    <h5 class="text-center">
                        <div id="c_registration_text">

                        </div>
                    </h5>
                    <form id="member_register" action="{{ url('member/complete-registration') }}" method="post" class="py-md-3 px-md-4 ajax-post">

                        <div class="row my-2">
                            <div class="col-md-4 form-group">
                                <input required="required" placeholder="Date of birth" name="date_of_birth" type="text" onfocus="(this.type='date')" id="date" class="my_input col-md border-0 rounded p-2 m-3"/>
                                 <small>Date of Birth</small>
                            </div>

                            @csrf
                            <input type="hidden" name="package_id">
                            @php
                            $identifications = \App\Models\Core\Identification::where('is_provider',0)->get();
                            @endphp
                            <div class="col-md-4 form-group">
                                <select name="identification_type" class="form-control p-2 m-3 custom-select">
                                    @foreach($identifications as $identification)
                                    <option value="{{ $identification->id }}">{{ $identification->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <input type="text" id="identification_number" required name="identification_number" placeholder="Identification Number" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>

                            <div class=" col-md-4 form-group">
                                <input type="password" id="password" required name="password" placeholder="Password" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>

                            <div class=" col-md-4 form-group">
                                <input type="password" id="password_confirmation" required name="password_confirmation" placeholder="Password Repeat" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>

                        </div>

                        <div class="col-md-6 mx-auto">
                            <div class="row">

                                <div class="col p-2 my-2 mx-1 text-center">
                                    <input type="submit" value="Continue" style="background-color: orangered; color: white !important;" class="btn btn-warning pl-4 pr-4 text-light submit-btn"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
      $(function () {
          let package_id = localStorage.getItem('package_id');

          $('input[name="package_id"]').val(package_id);
          let message = localStorage.getItem('package_message');

          $('#c_registration_text').append(message)

      })
    </script>
@endsection
