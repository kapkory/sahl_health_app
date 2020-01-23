@extends('layouts.sahl')
@section('styles')

    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('sahl/assets/image/hospital-background.svg') }}");
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
                                <b>Headline Here </b>
                            </h3>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 mx-auto">
        <div class="container mb-4">

            <div style="margin-top: -120px !important;" class="container py-md-3 bg-light shadow-lg rounded">
                <div class="col-11 mx-auto">
                    fsdfsdf
{{--                    <h5 class="text-center">--}}
{{--                        <div id="c_registration_text" v-if="package_cost > 0">--}}
{{--                            The package Costs Ksh<span class="text-success"> @{{ package_cost }}</span>--}}
{{--                        </div>--}}
{{--                    </h5>--}}

                </div>
            </div>
        </div>
    </div>



@endsection
