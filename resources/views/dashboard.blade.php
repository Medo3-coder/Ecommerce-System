@extends('frontend.main_master')
@section('title', 'Dashborad')

@section('content')

    <div class="body-content">

        <div class="container">

            <div class="row">
                <div class="col-md-2">
                    <br>
                    @if (!empty($adminData->profile_photo_path))
                        <img class="card-img-top" style="border-radius: 50% ;width: 170px ; height:200px"
                            src="{{ asset('upload/admin_images/' . $adminData->profile_photo_path) }}"
                            style="width: 100px ; height:100px">
                    @else
                        <img class="card-img-top" style="border-radius: 50% ;width: 170px ; height:200px"
                            src="{{ asset('upload/no_image.jpg') }}">
                    @endif

                    <br><br>
                    <ul class="list-group list-group-flush">

                        <a href="" class="btn btn-primary btn-sm btn-block"> Home </a>
                        <a href="" class="btn btn-primary btn-sm btn-block"> Profile Update </a>
                        <a href="" class="btn btn-primary btn-sm btn-block"> Change Password </a>
                        <a href="" class="btn btn-danger btn-sm btn-block"> Logout </a>


                    </ul>


                </div> {{-- end col md 2 --}}

                <div class="col-md-2">


                </div> {{-- end col md 2 --}}


                <div class="col-md-6">

                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger"> Hi...</span> <strong>{{ Auth::user()->name }}</strong>
                            Welcome To Our Shop
                            <h3>

                    </div>



                </div> {{-- end col md 6 --}}


            </div> {{-- end row --}}

        </div>

    </div>


@endsection
