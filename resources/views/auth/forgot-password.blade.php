@extends('frontend.main_master')

@section('content')
    <div class="body-content">
        <div class="container">

            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">


                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        <br>



                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="email">
                            </div>

                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password
                                Reset Link</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>





        <x-jet-validation-errors class="mb-4" />


    </x-jet-authentication-card>
</x-guest-layout> --}}
