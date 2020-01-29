@extends('layouts.sahl')
@section('styles')

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
            <div
                class="form_cont container py-md-5 bg-light shadow-lg rounded mb-5"
            >
                <div class="col-11 mx-auto">
                    <div class="col-5 col-md-2 mx-auto">
                        <img src="{{ url('frontend/assets/user.png') }}" alt="User Logo" width="100%" class="user_image mb-2"/>
                    </div>
                    <h5 class="text-center">
                        <caption>
                            Please Select the Package you wish
                            <br />
                            to subscribe.
                        </caption>
                    </h5>
{{--                    <form action="" class="py-md-3 px-md-4">--}}

                        @foreach($categories as $category)
                            <h3 style="color: orangered">{{ $category->name }}</h3>
                        <div class="row my-2">
                        @php
                        $class_colors = ['','info','secondary','success'];
                        @endphp
                        @foreach($category->packages as $package)
                            <div class="col-md-4">
                                <button id="package_btn_{{ $package->id }}" onclick="setPackage('{{ $package }}','{{ $category }}')" type="button" style="border-width:thick; border-radius: 20px" class="btn btn-outline-{{ @$class_colors[$loop->iteration] }} col-md m-3">
                                    <h4 class="font-weight-900">KES</h4>
                                    <span class="font-weight-800">{{ $package->cost.'/=' }}</span><br>
                                    <span><b>{{ $package->duration }}</b> Months</span><br>
                                </button>
                            </div>
                            @endforeach

                        </div>
                        @endforeach

                        <div class="col-md-6 mx-auto">
                            <div class="row">
                                <div id="error_alert"></div>
                                <div class="col p-2 my-2 mx-1 text-center">
                                    <input onclick="return checkPackage()" type="button" value="Continue" style="background-color: orangered; color: white !important;" class="btn btn-warning pl-4 pr-4 text-light"/>
                                </div>
                            </div>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

    <script>
        function setPackage(package,category) {
            $('.btn').removeClass('active');
            package = JSON.parse(package);
            let p_id = '#package_btn_'+package.id;
            $(p_id).addClass('active');
            category = JSON.parse(category);
            localStorage.setItem('package_id',package.id);
            let message = 'Thank you for choosing <b>'+category.name+'</b> for \n <span class="alert alert-success"> KES '+package.cost+'</span> for '+package.duration+' months.<br>Please fill the details below';
            localStorage.setItem('package_message',message);
         console.log(message);
        }

        function checkPackage() {
        if(localStorage.getItem('package_id'))
        {
            console.log('package id is '+localStorage.getItem('package_id'));
            window.location.href="{{ url('member-complete-registration') }}";
        }
        else
            $('#error_alert').append('<div class="alert alert-danger">Please Select a Package to Proceed, select by clicking on a package</div>');

        }
    </script>
@endsection
