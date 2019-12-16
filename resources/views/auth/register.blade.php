@extends('layouts.app')

@section('content')

    <!-- Login Container -->
    <div class="dt-login--container">

        <!-- Login Content -->
        <div class="dt-login__content-wrapper">

            <!-- Login Background Section -->
            <div class="dt-login__bg-section">

                <div class="dt-login__bg-content">
                    <!-- Login Title -->
                    <h1 class="dt-login__title">Sign Up</h1>
                    <!-- /login title -->

                    <p class="f-16">Register as a Member of Sahl Health.</p>
                </div>


                <!-- Brand logo -->
                <div class="dt-login__logo">
                    <a class="dt-brand__logo-link" href="index.php">
                        <img class="dt-brand__logo-img" src="{{ url('drift') }}/assets/images/logo-white.png" alt="Drift">
                    </a>
                </div>
                <!-- /brand logo -->

            </div>
            <!-- /login background section -->

            <!-- Login Content Section -->
            <div class="dt-login__content">

                <!-- Login Content Inner -->
                <div class="dt-login__content-inner">

                    <!-- Form -->
                    <form action="{{ route('register') }}" method="post">

                        <!-- Form Group -->
                        <div class="form-group">
                            <label  for="user-name">Name</label>
                            <input required type="text" name="name" class="form-control" id="user-name" aria-describedby="user-name"
                                   placeholder="Full Names">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- /form group -->

                        @csrf
                        <!-- Form Group -->
                        <div class="form-group">
                            <label for="email-1">Email address</label>
                            <input required type="email" name="email" class="form-control" id="email-1" aria-describedby="email-1"
                                   placeholder="Enter email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <label class="sr-only" for="email-1">Email address</label>
                            <select name="identification_type" class="form-control" id="simple-select">
                                <option value="ID Number">ID Number</option>
                                <option value="Passport Number">Passport Number</option>
                                <option value="Driving License">Driving License</option>
                                <option value="Huduma Number">Huduma Number</option>
                            </select>
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <label  for="identification">Identification Number</label>
                            <input name="identification_number" required type="text" class="form-control" id="identification" aria-describedby="identification"
                                   placeholder="Enter Your ID/Passport/Driving Licence">

                            @error('identification')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <label  for="phone">Phone Number</label>
                            <input name="phone_number" required type="text" class="form-control" id="phone" aria-describedby="phone"
                                   placeholder="+254722000000">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <label for="password-1">Password</label>
                            <input required name="password" type="password" class="form-control" id="password-1" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="dt-checkbox d-block mb-6">
                            <input checked="checked" disabled  name="terms" type="checkbox" id="checkbox-1">
                            <label class="dt-checkbox-content" for="checkbox-1"> by signing up, I accept
                                <a href="javascript:void(0)">Term &amp; Condition</a>
                            </label>
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary text-uppercase">Sign up</button>
                            <span class="d-inline-block ml-4">Or
              <a class="d-inline-block font-weight-500 ml-3" href="{{ url('login') }}">Login</a>
            </span>
                        </div>
                        <!-- /form group -->

                        <!-- Form Group -->
                        <div class="d-flex flex-wrap align-items-center">
                            <span class="d-inline-block mr-2">Or connect with</span>

                            <!-- List -->
                            <ul class="dt-list dt-list-sm dt-list-cm-0 ml-auto">
                                <li class="dt-list__item">
                                    <!-- Fab Button -->
                                    <a href="{{ url('facebook/login') }}" class="btn btn-outline-primary dt-fab-btn size-30">
                                        <i class="icon icon-facebook icon-xl"></i>
                                    </a>
                                    <!-- /fab button -->
                                </li>

                                <li class="dt-list__item">
                                    <!-- Fab Button -->
                                    <a href="{{ url('google/login') }}" class="btn btn-outline-primary dt-fab-btn size-30">
                                        <i class="icon icon-google-plus icon-xl"></i>
                                    </a>
                                    <!-- /fab button -->
                                </li>

{{--                                <li class="dt-list__item">--}}
{{--                                    <!-- Fab Button -->--}}
{{--                                    <a href="javascript:void(0)" class="btn btn-outline-primary dt-fab-btn size-30">--}}
{{--                                        <i class="icon icon-github icon-xl"></i>--}}
{{--                                    </a>--}}
{{--                                    <!-- /fab button -->--}}
{{--                                </li>--}}

{{--                                <li class="dt-list__item">--}}
{{--                                    <!-- Fab Button -->--}}
{{--                                    <a href="javascript:void(0)" class="btn btn-outline-primary dt-fab-btn size-30">--}}
{{--                                        <i class="icon icon-twitter icon-xl"></i>--}}
{{--                                    </a>--}}
{{--                                    <!-- /fab button -->--}}
{{--                                </li>--}}
                            </ul>
                            <!-- /list -->
                        </div>
                        <!-- /form group -->


                    </form>
                    <!-- /form -->

                </div>
                <!-- /login content inner -->

            </div>
            <!-- /login content section -->

        </div>
        <!-- /login content -->

    </div>

@endsection
