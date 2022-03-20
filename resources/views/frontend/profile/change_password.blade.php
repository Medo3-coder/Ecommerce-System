@extends('frontend.main_master')
@section('title', 'Change Password')

@section('content')

    {{-- @php
//to get athenticated user data
    $user = DB::table('users')->where('id' , Auth::user()->id)->first();
@endphp --}}

    <div class="body-content">

        <div class="container">

            <div class="row">
                <div class="col-md-2">
                    <br>


                    @if (!empty($user->profile_photo_path))
                        <img class="card-img-top" style="border-radius: 50% ;width: 170px ; height:200px"
                            src="{{ asset('upload/user_images/' . $user->profile_photo_path) }}"
                            style="width: 100px ; height:100px">
                    @else
                        <img class="card-img-top" style="border-radius: 50% ;width: 170px ; height:200px"
                            src="{{ asset('upload/no_image.jpg') }}">
                    @endif

                    <br><br>
                    <ul class="list-group list-group-flush">

                        <a href="{{ route('User_dashboard') }}" class="btn btn-primary btn-sm btn-block"> Home </a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block"> Profile Update </a>
                        <a href=" {{ route('change.password') }}" class="btn btn-primary btn-sm btn-block"> Change Password
                        </a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block"> Logout </a>


                    </ul>


                </div> {{-- end col md 2 --}}

                <div class="col-md-2">


                </div> {{-- end col md 2 --}}


                <div class="col-md-6">

                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger"></span> <strong>Change Password</strong>

                            <h3>


                                <form method="POST" action="{{ route('user.password.update') }}" id="password-update">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Current Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="current_password" name="oldpassword" type="password"
                                                class="form-control">
                                        </div>
                                        @error('oldpassword')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>New Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password" type="password" name="password"
                                                class="form-control">
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <h5>Confirm Password<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password_confirmation" type="password"
                                                name="password_confirmation" class="form-control">

                                        </div>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn btn-danger">Update</button>
                                    </div>



                                </form>

                    </div>



                </div> {{-- end col md 6 --}}


            </div> {{-- end row --}}

        </div>

    </div>


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>


        $(document).ready(function() {
            $(document).on('submit', '#password-update', function(e) {
                e.preventDefault()

                var url = $(this).attr('action')
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: new FormData(this),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        console.log(res)
                        toastr.success(res.success);
                    },
                    error: function(res) {
                        $.each(res.errors, function(index, value) {
                            console.log(res)
                            toastr.success(res.errors);
                        });

                    },

                })
            })
        })
    </script> --}}



@endsection
