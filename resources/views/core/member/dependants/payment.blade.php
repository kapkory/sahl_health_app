@extends('layouts.sahl')
@section('styles')

@endsection
@section('content')
    <div class="container-fluid bg-dark-myimg pb-md-5 mb-md-5 ">
        <div class="col-md-10 mx-auto">
            <div class="container py-md-5">
                <div class="rounded">
                    <div class="row py-4">


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

                            You will be charged KES&nbsp;<b>{{ $amount }}/=</b>
                    </p>
                    @if(url('member/dependants/payments') != url()->current())
                    <span>
                        <a class="btn btn-outline-primary" href="{{ url('member/dependants/payments') }}">View All Transactions</a>
                    </span>
                    @endif
                    <h6>Dependant(s) Details</h6>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Other Names</th>
                            <th>Last Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $dependant_ids = [];
                        ?>
                        @foreach($dependants as $dependant)
                            <?php
                            $dependant_ids[] = $dependant->id;
                            ?>
                        <tr>
                            <td>{{ $dependant->first_name }}</td>
                            <td>{{ $dependant->other_name }}</td>
                            <td>{{ $dependant->last_name }}</td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div id="error_alert"></div>
                            <div class="col p-2 my-2 mx-1 text-center">
                                <form method="post" action="{{ url('member/dependants/payments') }}" class="ajax-post">
                                    @csrf
                                    <input type="hidden" name="dependant_ids" value="{{ json_encode($dependant_ids) }}">
                                    <input type="hidden" name="amount" value="{{ $amount }}">
                                    <input type="submit" value="Complete Transaction" style="background-color: orangered;border-color: orangered; color: white !important;" class="btn btn-warning pl-4 pr-4 text-light"/>

                                </form>
                            </div>
                        </div>
                    </div>
                    {{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
    <script>

        {{--function requestPayment() {--}}
        {{--    let url = "{{ url('member/dependant/payments?_token='.csrf_token()) }}";--}}
        {{--    $.post(url,{'amount':"{{ $amount }}",function (response) {--}}
        {{--        window.location.href = response.redirect_url;--}}
        {{--    })--}}
        {{--}--}}
    </script>
@endsection
