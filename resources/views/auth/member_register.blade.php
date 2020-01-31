@extends('layouts.sahl')
@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{--    <link rel="stylesheet" href="{{ url('drift/assets/modules/intlTelInput/intlTelInput.min.css') }}">--}}

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

                    <div class="row my-2">

                        <div class=" p-2 col-md-4 offset-md-4 form-group text-center">
                            <a style="color: #212121;border-color: #212121;" href="{{ url('google/login') }}" class="btn btn-outline-secondary btn-lg btn-block">
                                <i class="fa fa-google"></i> &nbsp;Register with Google </a>
                        </div>

                    </div>
                    <div class="row my-2">
                        <div class=" p-2 col-md-4 offset-md-4 form-group text-center">
                            <a style="background-color: #FF5A5F;border-color:white; color: white;box-shadow: none;" data-toggle="modal" data-target="#providerSignUpModal" class="btn btn-outline-dark btn-lg btn-block">
                                <i class="fa fa-phone"></i>
                                &nbsp;Register with Phone
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="providerSignUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="ajax-post" id="providerRegistration" method="post" action="{{ url('member/register') }}">
                        <div class="form-group">
                            {{--                            <small>Proceed with Value after leading 0 e.g +254712141141</small>--}}
                            <input type="text"  name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
                        </div>

                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
                        </div>
{{--                        <input type="hidden" name="package_id" value="0">--}}

                        @csrf
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
                        </div>

                        <div class="form-group">
                            <input type="text" name="other_name" class="form-control" id="other_name" placeholder="Other Name">
                        </div>


                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email_address" placeholder="Email Address">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <button  style="background: #FF5A5F; color: white" type="submit" class="btn btn-lg btn-block submit-btn">
                                &nbsp;Sign up
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End of Provider Sign Up Modal -->

    <script>
        if (localStorage.getItem('package_id') != null){
            // console.log('local storage is pakaga'+localStorage.getItem('package_id'))
            $('input[name="package_id"]').val(localStorage.getItem('package_id'));
        }
    </script>
@endsection

