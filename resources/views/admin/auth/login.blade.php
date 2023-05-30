<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Medo Admin - Log in </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>

<body class="hold-transition theme-primary bg-gradient-primary">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="content-top-agile p-10">
                            <h2 class="text-white">Get started with Us</h2>
                            <p class="text-white-50">Sign in to start your session</p>
                        </div>
                        <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="phone">{{ __('site.email') }}</label>
                                    <input type="email" class="form-control" placeholder="{{ __('site.email') }}"
                                        name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="user-password">{{ __('site.password') }}</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="{{ __('site.password') }}" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkbox text-white">
                                            <input type="checkbox" id="remember_me" name="remember">
                                            <label for="basic_checkbox_1">{{ __('site.remember') }}</label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <div class="fog-pwd text-right">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}"
                                                    class="text-white hover-info"><i class="ion ion-locked"></i> Forgot
                                                    pwd?</a><br>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button type="submit"
                                            class="btn btn-primary float-right btn-inline submit_button">{{ __('site.login') }}</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                            <div class="text-center text-white">
                                <p class="mt-20">- Sign With -</p>
                                <p class="gap-items-2 mb-20">
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                            class="fa fa-facebook"></i></a>
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                            class="fa fa-twitter"></i></a>
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                            class="fa fa-google-plus"></i></a>
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                            class="fa fa-instagram"></i></a>
                                </p>
                            </div>

                            <div class="text-center">
                                <p class="mt-15 mb-0 text-white">Don't have an account? <a href="auth_register.html"
                                        class="text-info ml-5">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $(document).on('submit', '.form-horizontal', function(e) {
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
                        $(".submit_button").html('<i class="fas fa-spinner"></i>').attr(
                            'disables', true);
                    },
                    success: function(response) {
                        $(".text-danger").remove()
                        $('.form-horizontal input').removeClass('border-danger')
                        if (response.status == 'login') {
                            // toastr.success(response.message)
                            setTimeout(function() {
                                window.location.replace(response.url)
                            }, 1000);
                        } else {
                            $(".submit_button").html(
                                `<i class="ft-unlock"></i> {{ __('admin.login') }}`).attr(
                                'disable', false)
                            $('.form-horizontal input[name=password]').addClass('border-danger')
                            $('.form-horizontal input[name=password]').after(
                                `<span class="mt-5 text-danger">${response.message}</span>`);
                        }
                    },
                    error: function(xhr) {
                        $(".submit_button").html("{{ __('admin.login') }}").attr('disable',
                            false)
                        $(".text-danger").remove()
                        $('.form-horizontal input').removeClass('border-danger')

                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $('.form-horizontal input[name=' + key + ']').addClass(
                                'border-danger')
                            $('.form-horizontal input[name=' + key + ']').after(
                                `<span class="mb-5 text-danger">${value}</span>`);

                        });
                    },
                });

            });
        });
    </script>


</body>

</html>
