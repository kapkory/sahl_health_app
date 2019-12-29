@extends('layouts.frontend')
@section('content')
<div class="container-fluid bg-dark-myimg pb-md-5 mb-md-5 ">
    <div class="col-md-10 mx-auto">
        <div class="container py-md-5">
            <div class="rounded">
                <div class="row py-4">
                    <div class="col-md-8 pt-md-3 mt-md-3">
                        <h3 class="text-light">
                            <b>ACCESS AFFORDABLE HEALTHCARE ANYWHERE ANYTIME</b>
                        </h3>
                        <p class="text-light pt-3 mt-3 lead">
                            Save up to <b>20%</b> at the best Healthcare providers near
                            you
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
                <form action="" class="py-md-3 px-md-4">
                    <div class="col-5 col-md-2 mx-auto">
                        <img
                            src="{{url('frontend/assets/user.png')}}"
                            alt=""
                            width="100%"
                            class="user_image mb-2"
                        />
                    </div>
                    <h5 class="text-center">
                        <caption>
                            Thank you for choosing indivudual membership for
                            <br />
                            <span class="text-success text-bold"
                            ><b>KES 399 for 3m.</b></span
                            >
                            Please fill in the details below .
                        </caption>
                    </h5>
                    <div class="row my-2">
                        <input
                            type="text"
                            placeholder="First Name"
                            class="my_input col-md border-0 rounded p-2 m-3"
                        />
                        <input
                            type="text"
                            placeholder="Second Name"
                            class="my_input col-md border-0 rounded p-2 m-3"
                        />
                        <input
                            type="email"
                            placeholder="Email Address"
                            class="my_input col-md border-0 rounded p-2 m-3"
                        />
                    </div>
                    <div class="row my-2">
                        <input
                            type="text"
                            placeholder="Mobile Number"
                            class="my_input col-md border-0 rounded p-2 m-3"
                        />
                        <input
                            placeholder="Date of birth"
                            type="text"
                            onfocus="(this.type='date')"
                            id="date"
                            class="my_input col-md border-0 rounded p-2 m-3"
                        />
                        <input
                            placeholder="Start Date"
                            type="text"
                            onfocus="(this.type='date')"
                            id="date"
                            class="my_input col-md border-0 rounded p-2 m-3"
                        />
                    </div>
                    <div class="row my-2">
                        <input
                            type="text"
                            placeholder="Resident Area"
                            class="my_input col-md border-0 rounded p-2 m-3"
                        />
                        <input
                            type="text"
                            placeholder="Country of Birth"
                            class="my_input col-md border-0 rounded p-2 m-3"
                        />
                        <span class="col-md border-0 rounded p-2 m-3"></span>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="row">
                            <div class="col p-2 my-2 mx-1">
                                <input
                                    type="button"
                                    value="Cancel"
                                    class="btn btn-outline-dark btn-block p-2"
                                />
                            </div>
                            <div class="col p-2 my-2 mx-1">
                                <input
                                    type="submit"
                                    value="Submit"
                                    class="btn btn-warning btn-block p-2 text-light"
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
