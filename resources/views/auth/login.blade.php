@extends('frontend.main_master')

@section('title', 'Login')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->


    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with
                                Facebook</a>
                            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                        </div>
                        <form method="POST" action="{{ route('siteLogin') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.email') }}
                                    <span>*</span></label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="{{ __('admin.enter_the_email') }}" required />
                                <i class="fa-regular fa-circle-user"></i>

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">{{ __('site.password') }}
                                    <span>*</span></label>
                                <input type="password" name="password" class="form-control" required
                                    placeholder="{{ __('admin.enter_the_password') }}"
                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}" />

                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio" id="remember_me" name="remember">Remember
                                    me!
                                </label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="forgot-password pull-right">{{ __('site.forgetPass') }}</a>
                                @endif
                            </div>
                            <button type="submit"
                                class="btn btn-primary mr-1 mb-1 submit_button">{{ __('admin.add') }}</button>
                        </form>
                        <br>

                        <p class="mt-15 mb-0 text-white">Don't have an account? <a href="{{ route('register') }}"
                                class="text-info ml-5">{{ __('site.new_account') }}</a></p>


                    </div>
                    <!-- Sign-in -->


                    <!-- create a new account -->
                    {{-- <div class="col-md-6 col-sm-6 create-new-account">

                        <p class="text title-tag-line">Create your new account.</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" name="name" class="form-control unicase-form-control text-input"
                                    id="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                <input type="phone" name="phone" class="form-control unicase-form-control text-input"
                                    id="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control unicase-form-control text-input"
                                    id="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password
                                    <span>*</span></label>
                                <input type="password" name="password_confirmation"
                                    class="form-control unicase-form-control text-input" id="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                        </form>


                    </div> --}}
                    <!-- create a new account -->

                </div><!-- /.row -->

                @include('frontend.layouts.brands')
            </div><!-- /.sigin-in-->

        </div><!-- /.body-content -->
    @endsection

    @push('js')
        {{-- submit add form script --}}
        @include('admin.shared.submitAddForm')
        {{-- submit add form script --}}
    @endpush
