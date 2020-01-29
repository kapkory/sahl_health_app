@extends('layouts.sahl')
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
            padding-left: 45px !important;
        }
    </style>
    <script src="{{ url('drift/assets/js/vue-2.6.min.js') }}"></script>

    <script src="{{ url('drift/assets/modules/intlTelInput/intlTelInput.js') }}"></script>

@endsection
@section('content')
    <div class="container-fluid bg-dark-myimg pb-md-5 mb-md-5 ">
        <div class="col-md-10 mx-auto">
            <div class="container py-md-5">
                <div class="rounded">
                    <div class="row py-4">
                        <div class="col-md-8 pt-md-3 mt-md-3">
{{--                            <h3 class="text-light">--}}
{{--                                <b>ACCESS AFFORDABLE HEALTHCARE <br>&nbsp;&nbsp;&nbsp; ANYWHERE, ANYTIME</b>--}}
{{--                            </h3>--}}
{{--                            <p class="text-light pt-3 mt-3 lead">--}}
{{--                                Save up to <b style="font-size: 26px">20%</b> at the best <br>Healthcare providers near--}}
{{--                                you!--}}
{{--                            </p>--}}
                        </div>
                        <div class="col-md-4 pt-md-3 mt-md-3">
{{--                            <img src="{{ url('frontend/assets/sahl/heart.png') }}" alt="Heart Beat">--}}
{{--                            <i--}}
{{--                                class="fa fa-heartbeat text-light fa-5x float-md-right"--}}
{{--                                aria-hidden="true"--}}
{{--                            ></i>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-10 mx-auto" id="complete_reg">
        <div class="container mb-4">
            <div class="form_cont container py-md-5 bg-light shadow-lg rounded mb-5">
                <div class="col-11 mx-auto">

                    <form id="member_register" action="{{ url('member-complete-registration') }}" method="post" class="py-md-3 px-md-4 ajax-post">

                        <div class="row my-2">
                            @isset($_GET['type'])
                                @if($_GET['type'] == 'social')
                                <div class="col-md-4 form-group">
                                    <input type="text" id="phone_number" required name="phone_number" placeholder="Phone Number" class="my_input col-md border-0 rounded m-2 p-2"/>
                                </div>
                                    <input type="hidden" name="type" value="social">
                                    @elseif($_GET['type'] == 'account')
                                    <div class="col-md-4 form-group">
                                        <input type="text" id="phone_number" required name="phone_number" placeholder="Phone Number" class="my_input col-md border-0 rounded m-2 p-2"/>
                                    </div>
                                    <input type="hidden" name="type" value="account">
                                    <div class="col-md-4 form-group">
                                        <input type="password" id="password" required name="password" placeholder="Enter Password" class="my_input col-md border-0 rounded m-2 p-2"/>
                                    </div>
                                    @elseif($_GET['type'] == 'referred')
                                    <div class="col-md-4 form-group">
                                        <input type="hidden" name="type" value="referred">
                                        <input type="password" id="password" required name="password" placeholder="Enter Password" class="my_input col-md border-0 rounded m-2 p-2"/>
                                    </div>
                                    @else
                                    <input type="hidden" name="phone_number" value="{{ auth()->user()->phone_number  }}">
                                    @endif
                            @endisset

                            <div class="col-md-4 form-group">
                                <input required="required" placeholder="Date of birth" name="date_of_birth" type="text" onfocus="(this.type='date')" id="date" class="my_input col-md border-0 rounded p-2 m-2"/>
                            </div>

                            @csrf
                            @php
                            $identifications = \App\Models\Core\Identification::where('is_provider',0)->get();
                            @endphp
                            <div class="col-md-4 form-group">
                                <select name="identification_type" class="form-control p-2 m-2 custom-select">
                                    @foreach($identifications as $identification)
                                    <option value="{{ $identification->id }}">{{ $identification->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <input type="text" id="identification_number" required name="identification_number" placeholder="Identification Number" class="my_input col-md border-0 rounded m-2 p-2"/>
                            </div>

                            @php
                                $packages = \App\Models\Core\PackageCategory::select('id','name')->get();
                            @endphp
                            <div class="col-md-5 form-group">
                                <select @change="setPackages" v-model="package_category_id" name="package_category_id" class="form-control p-2 m-2 custom-select">
                                    @foreach($packages as $package)
                                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <select @change="setPackageCost" name="package_id" v-model="package_id" class="form-control p-2 m-2 custom-select">
                                    <option value="">Please Select</option>
                                    <option :value="package.id" v-for="package in selected_packages">@{{ package.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2 my-2 mx-1 text-center">
                                <div id="c_registration_text" style="text-align: center; vertical-align: middle;" v-if="package_cost > 0">
                                   <h5> The package Costs Ksh<span class="text-success"> @{{ package_cost }}</span></h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mx-auto">
                            <div class="row">

                                <div class="col p-2 my-2 mx-1 text-center">
                                    <input type="submit" value="Continue" style="background-color: orangered; color: white !important; border-color: orangered" class="btn btn-warning pl-4 pr-4 text-light submit-btn"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        var app = new Vue({
            el: '#complete_reg',
            data: {
                message: 'Hello Vue!',
                package_category_id: 1,
                package_id: '',
                packages: [],
                package: [],
                package_cost: 0,
                selected_packages: [],
                filtered_packages: [],
            },
            mounted() {
                let api_url = "{{ url('api/institution/packages') }}";
                let self = this;
                fetch(api_url)
                    .then(response => response.json())
                    .then(json => {
                        this.packages = json.packages;

                        if(localStorage.getItem('package_id') != null){
                         let package=  this.packages.filter(function (package) {
                               return package.id == localStorage.getItem('package_id');
                            })
                            // self.package_category_id =
                            self.package_category_id = package[0].package_category_id;
                            self.package_id = package[0].id;
                            self.package_cost = package[0].cost;
                        }

                        filtered_packages = this.packages.filter(function (selected_package) {
                            return selected_package.package_category_id == self.package_category_id;
                        })
                        // console.log(filtered_packages);
                        this.selected_packages = filtered_packages;
                    });
            },
            methods:{
                setPackages : function () {
                    var self = this;
                    self.package_cost = 0;
                    return this.selected_packages = this.packages.filter(function (selected_package) {
                        return selected_package.package_category_id == self.package_category_id;
                    })
                },
                setPackageCost: function () {
                    var self = this;
                     this.package = this.packages.filter(function (selected_package) {
                        return selected_package.id == self.package_id;
                    })
                    if(self.package_id != '')
                        self.package_cost = this.package[0].cost;
                    else
                        self.package_cost = 0;
                }
            }
        });


      {{--$(function () {--}}
      {{--    let url = "{{ url('api/institution/packages?category=1') }}";--}}
      {{--    $.get(url, null, function (response) {--}}
      {{--       console.log(response);--}}
      {{--    });--}}
      {{--})--}}
    </script>

    <script>
        $(function () {
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
