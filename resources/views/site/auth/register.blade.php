@extends('site.layouts.master')

@section('title', __('Register'))

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">{{ __('Home') }}</a></li>
                    <li class='active'>{{ __('Register') }}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->


    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    {{-- <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>
                        <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                    id="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio" id="remember_me" name="remember">Remember
                                    me!
                                </label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot
                                        your Password?</a>
                                @endif
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>
                    </div> --}}
                    <!-- Sign-in -->


                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">{{ __('site.new_account') }}</h4>
                        {{-- <p class="text title-tag-line">{{ __('new_account') }}</p> --}}
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.name') }} <span>*</span></label>
                                <input type="text" name="name" class="form-control unicase-form-control text-input"
                                    id="name">

                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">{{ __('site.email') }} <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="email">

                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.phone2') }} <span>*</span></label>
                                <input type="phone" name="phone" class="form-control unicase-form-control text-input"
                                    id="phone">

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.password') }} <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                    id="password">

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.confirm_password2') }}
                                    <span>*</span></label>
                                <input type="password" name="password_confirmation"
                                    class="form-control unicase-form-control text-input" id="password_confirmation">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('site.sign_up') }}</button>
                        </form>


                    </div>
                    <!-- create a new account -->

                </div><!-- /.row -->

                @include('site.common.brands')
            </div><!-- /.sigin-in-->

        </div><!-- /.body-content -->
    @endsection
