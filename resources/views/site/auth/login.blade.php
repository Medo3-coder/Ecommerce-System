@extends('site.layouts.master')

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
                        <form method="POST" action="{{ route('siteLogin') }}" class="store">
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
                                class="btn btn-primary mr-1 mb-1 submit_button">{{ __('admin.login') }}</button>
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

                @include('site.common.brands')
            </div><!-- /.sigin-in-->

        </div><!-- /.body-content -->
    @endsection

    @push('js')
    <script>
        $(document).ready(function() {
          $(document).on('submit', '.store', function(e) {
            e.preventDefault();
            var url = $(this).attr('action')
            $.ajax({
              url: url,
              method: 'post',
              data: new FormData($(this)[0]),
              dataType: 'json',
              processData: false,
              contentType: false,
              beforeSend: function() {
                $(".submit_button").html(
                  '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                  ).attr('disable', true)
              },
              success: function(response) {
                $(".text-danger").remove()
                $('.store input').removeClass('border-danger')
                $(".submit_button").html("{{ __('admin.add') }}").attr(
                  'disable', false)
                Swal.fire({
                  position: 'top-start',
                  type: 'success',
                  title: '{{ __('site.login_successfully') }}',
                  showConfirmButton: false,
                  timer: 1500,
                  confirmButtonClass: 'btn btn-primary',
                  buttonsStyling: false,
                })

                setTimeout(function() {
                  window.location.replace(response.url)
                }, 1000);
              },
              error: function(xhr) {
                $(".submit_button").html("{{ __('admin.add') }}").attr(
                  'disable', false)
                $(".text-danger").remove()
                $('.store input').removeClass('border-danger')

                $.each(xhr.responseJSON.errors, function(key, value) {
                  // if kay has "." it means that input has two languages do this action to handle input name
                  if (key.indexOf(".") >= 0) {
                    var split = key.split('.')
                    key = split[0] + '\\[' + split[1] + '\\]'
                  }

                  $('.store .error.' + key ).append(`<span class="mt-5 text-danger">${value}</span>`);

                  // normal inputs
                  $('.store input[name^=' + key + ']').addClass('border-danger')
                  $('.store input[name^=' + key + ']').after(`<span class="mt-5 text-danger">${value}</span>`);
                  // for textarea
                  $('.store textarea[name^=' + key + ']').addClass('border-danger')
                  $('.store textarea[name^=' + key + ']').after(`<span class="mt-5 text-danger">${value}</span>`);
                  // for select input
                  $('.store select[name^=' + key + ']').addClass(
                  'border-danger')
                  $('.store select[name^=' + key + ']').after(
                    `<span class="mt-5 text-danger">${value}</span>`);
                });
              },
            });

          });
        });
      </script>


    @endpush
