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



                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">{{ __('site.new_account') }}</h4>
                        <form method="POST" action="{{ route('siteRegister') }}" class="store">
                            @csrf


                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.name') }}
                                    <span>*</span></label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="{{ __('admin.write_the_name') }}" />
                                <i class="fa-regular fa-circle-user"></i>

                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.email') }}
                                    <span>*</span></label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="{{ __('admin.enter_the_email') }}"  />
                                <i class="fa-regular fa-circle-user"></i>

                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.phone2') }}
                                    <span>*</span></label>
                                <input type="phone" name="phone" class="form-control" minlength="8" maxlength="11"
                                    data-validation-maxlength-message="{{ __('admin.maxlength') }}"
                                    data-validation-minlength-message="{{ __('admin.minlength') }}"
                                    placeholder="{{ __('admin.enter_the_phone') }}" />
                                <i class="fa-regular fa-circle-user"></i>

                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.password') }}
                                    <span>*</span></label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="{{ __('admin.password') }}" />
                                <i class="fa-regular fa-circle-user"></i>

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">{{ __('site.confirm_password2') }}
                                    <span>*</span></label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="{{ __('site.confirm_password2') }}" />
                            </div>
                            <button type="submit"
                                class="btn btn-primary mr-1 mb-1 submit_button">{{ __('site.sign_up') }}</button>
                        </form>


                    </div>
                    <!-- create a new account -->

                </div><!-- /.row -->

                @include('site.common.brands')
            </div><!-- /.sigin-in-->

        </div><!-- /.body-content -->
    @endsection




    @push('js')
    {{-- submit add form script --}}
    @include('admin.shared.submitAddForm')
    {{-- submit add form script --}}
@endpush
