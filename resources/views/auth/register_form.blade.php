@extends('layouts.sahl')
@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            padding-left: 5px !important;
        }
        /*#phone_number{*/
        /*    padding-left: 40px !important;*/
        /*}*/
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
                                <b>Transforming Health <br>&nbsp;&nbsp;&nbsp; Everyday Everywhere</b>
                            </h3>
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
                    <form id="providerRegistration" class="ajax-post" method="post" action="{{ url('member/register') }}">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input type="text" id="first_name" required name="first_name" placeholder="First Name" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>

                            <div class="col-md-4 form-group">
                                <input type="text" id="last_name" required name="last_name" placeholder="Last Name" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="other_name" name="other_name" placeholder="Other Name" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>
                        </div>

                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input type="text" id="email" required name="email" placeholder="Email Address" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>

                            <div class="col-md-4 form-group ">
                                <input type="text"  name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="password" id="password" required name="password" placeholder="Password" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>
                        </div>

                        <div class="row">
                            @isset($referral_code)
                                <input type="hidden" name="referral_code" value="{{ $referral_code }}">
                                @endisset
                            <div class="col-md-4 form-group">
                                <input type="password" id="password_confirmation" required name="password" placeholder="Confirm Password" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>
                        </div>
                        <div class="text-center">
                            <button  style="background: #FF5A5F; color: white" type="submit" class="btn btn-md submit-btn">
                                &nbsp;Sign up
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <script>
        $(function () {
            const form = document.getElementById('providerRegistration');
            const input = form.querySelector('#phone_number');
            var itil=  window.intlTelInput(input, {
                "preferredCountries":["KE","UG","TZ"],
            });
            $('input[name="phone_number"]').val('+254');
            input.addEventListener("countrychange", function() {
                var text = (itil.isValidNumber()) ? "International: " + itil.getNumber() : "Please enter a number below";
                var textNode = document.createTextNode(text);
                output.innerHTML = "";
                output.appendChild(textNode);
            });
        });
    </script>
@endsection

