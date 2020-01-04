@extends('layouts.frontend')
@section('styles')
    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('frontend/assets/background.jpg') }}");
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid bg-dark-myimg pb-md-5 mb-md-5 ">
        <div class="col-md-10 mx-auto">
            <div class="container py-md-5">
                <div class="rounded">
                    <div class="row py-4">
                        <div class="col-md-8 pt-md-3 mt-md-3">
                            <h3 class="text-light">
                                <b>ACCESS AFFORDABLE HEALTHCARE <br>&nbsp;&nbsp;&nbsp;ANYWHERE ANYTIME</b>
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
            <div
                class="form_cont container py-md-5 bg-light shadow-lg rounded mb-5"
            >
                <div class="col-11 mx-auto">
                    <div class="col-5 col-md-2 mx-auto">
                        <img src="{{ url('frontend/assets/user.png') }}" alt="User Logo" width="100%" class="user_image mb-2"/>
                    </div>
                    <h5 class="text-center">
                        <caption>
                            Payment Option
                            <br />
                        </caption>
                    </h5>
                    {{--                    <form action="" class="py-md-3 px-md-4">--}}


                    <div class="col-5 col-md-2 mx-auto">
                        <img src="{{ url('frontend/assets/mpesa-logo.png') }}" alt="User Logo" width="100%" class="mb-2"/>
                    </div>
                    <p class="text-center">
                        Your Phone Number is <b>{{ auth()->user()->phone_number }}</b><br>
                        <small>After clicking the Complete Transaction button a  popup will be sent to your phone for you to finish the transaction</small>
                        @isset($package)
                            You will be charged KES&nbsp;<b>{{ $package->amount }}/=</b>
                            @endisset
                    </p>


                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div id="error_alert"></div>
                            <div class="col p-2 my-2 mx-1 text-center">
                                <input onclick="return requestPayment()" type="button" value="Complete Transaction" style="background-color: orangered; color: white !important;" class="btn btn-warning pl-4 pr-4 text-light"/>
                            </div>
                        </div>
                    </div>
                    {{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
<script>
    function requestPayment() {
    let url = "{{ url('member/request-payment?_token='.csrf_token()) }}";
    $.post(url,function (response) {
      window.location.href = response.redirect_url;
    })
    }
</script>
@endsection
