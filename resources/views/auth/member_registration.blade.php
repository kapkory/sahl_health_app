@extends('layouts.frontend')
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
                    <div class="col-5 col-md-2 mx-auto">
                        <img src="{{ url('frontend/assets/user.png') }}" alt="User Logo" width="100%" class="user_image mb-2"/>
                    </div>
                    <h5 class="text-center">
                        <caption>
                            Thank you for choosing Sahl, Please provide
                            <br />
                            the details below to get started.
                        </caption>
                    </h5>
                    <form id="member_register" action="{{ url('member-register') }}" method="post" class="py-md-3 px-md-4 ajax-post">

                        <div class="row my-2">
                            <div class="p-2 col-md-4 form-group">
                                <input type="text" required name="name" placeholder="Your Name" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>

                            @csrf
                            <div class="p-2 col-md-4 form-group">
                                <input type="email" required name="email" placeholder="Your Email" class="my_input col-md border-0 rounded m-3 p-2"/>
                            </div>

                            <div class="p-2 col-md-4 form-group">
                                <input type="tel" id="phone_number" required name="phone_number" placeholder="Your Number" class="my_input col-md border-0 rounded m-3 p-2"/>
                                <small>Enter phone number starting with country code e.g. +254722000000
                                </small>
                            </div>

                         </div>

                        <div class="col-md-6 mx-auto">
                            <div class="row">

                                <div class="col p-2 my-2 mx-1 text-center">
                                    <input type="submit" value="Get Started" style="background-color: orangered; color: white !important;" class="btn btn-warning pl-4 pr-4 text-light submit-btn"
                                    />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            const form = document.getElementById('member_register');
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
