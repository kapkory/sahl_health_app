@extends('layouts.app')

@section('content')
<style>
    .dt-login__bg-section::before,dt-login__bg-section{
        background-color: #335062
    }
</style>
    <!-- Login Container -->
    <div class="dt-login--container" style="background-image: url({{ url('sahl/assets/image/family.jpg') }}); object-fit: cover">

        <!-- Login Content -->
        <div class="dt-login__content-wrapper" >

            <!-- Login Background Section -->
            <div class="dt-login__bg-section">

                <div class="dt-login__bg-content">
                    <!-- Login Title -->
                    <h1 class="dt-login__title">Sign In</h1>
                    <!-- /login title -->

                    <p class="f-16">    Welcome back to<br>
                        My Sahl Health Plan<br>
                        Let’s pick up where you left..</p>
                </div>


                <!-- Brand logo -->
                <div class="dt-login__logo">
                    <a class="dt-brand__logo-link" href="#">
                        <img style="width: 180px" class="dt-brand__logo-img" src="{{ url('frontend/assets/sahl-logo.png') }}" alt="Sahl Health Logo">
                    </a>
                </div>
                <!-- /brand logo -->

            </div>
            <!-- /login background section -->

            <!-- Login Content Section -->
            <div class="dt-login__content">

                <!-- Login Content Inner -->
                <div class="dt-login__content-inner">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone_number">Phone Number / Email Address</label>
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                                 <small class="text-dark">Enter your phone number starting with country code e.g. +254722000000
                                 </small>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group row mb-0">

                            <button style="background: #F07A3B; border-color: #F07A3B" type="submit" class="btn btn-primary">
                                {{ __('Sign In') }}
                            </button>
                        </div>

                    </form>
                        <div class="row">
                            <a class="btn btn-link" style="color: #335062" href="{{ route('password.request') }}">
                                {{ __('Forgot your Sign In ID or Password?') }}
                            </a>
                        </div>
                    <!-- Form Group -->
                     <div class="d-flex flex-wrap align-items-center">
{{--                        <span class="d-inline-block mr-2">Or connect with</span>--}}

                       <div style="clear: left">
                           <!-- List -->
                           <ul class="dt-list dt-list-sm dt-list-cm-0 ml-auto">
                               <li class="dt-list__item">
                                   <!-- Fab Button -->
{{--                                   <a style="display: none" href="{{ url('facebook/login') }}" class="btn btn-outline-primary dt-fab-btn size-30">--}}
{{--                                       <i class="icon icon-facebook icon-xl"></i>--}}
{{--                                   </a>--}}
                                   <!-- /fab button -->
                               </li>
                           </ul>

                       </div>
                         <div class="row mt-2">
                               <a style="background-color: #335062; border-color: #335062" href="{{ url('google/login') }}" class="btn btn-primary btn-block">
                                   Sign In with Google
                               </a>

                         </div>
                        <!-- /list -->
                    </div>
                </div>
                <!-- /login content inner -->


                <!-- Login Content Footer -->
                <div class="dt-login__content-footer">
                    @if (Route::has('password.request'))

                        <a class="d-inline-block font-weight-500 ml-3" style="color: #335062" href="{{ url('register') }}">Create New Account</a>
                    @endif
                </div>
                <!-- /login content footer -->

            </div>
            <!-- /login content section -->

        </div>
    </div>
@endsection
