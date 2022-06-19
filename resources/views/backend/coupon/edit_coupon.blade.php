@extends('admin.layouts.admin_master')

@section('title', 'Coupon Edit')

@section('admin')

@if (session()->has('error'))
<div class="alert alert-danger" role="alert">
    {{ session()->get('error') }}
</div>
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>
@endforeach
@endif

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">

                    <h3 class="page-title"><a href="{{ route('manage-coupon') }}">Coupons</a></h3>
                    {{-- <h3 class="page-title"><a href="{{ url()->current() }}">Category</a></h3> --}}
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home<i
                                            class="mdi mdi-home-outline"></i></a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">



                <!-- /.Add Brand form -->


                <div class="col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Coupon Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="POST" action="{{ route('coupon.update', $coupon->id) }}">


                                    @csrf
                                    <div class="form-group">
                                        <h5>Coupon Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="coupon_name" name="coupon_name"
                                                class="form-control" value="{{ $coupon->coupon_name }}">
                                            @error('coupon_name')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="coupon_discount" name="coupon_discount"
                                                class="form-control" value="{{ $coupon->coupon_discount }}">
                                            @error('category_name_hin')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Validity Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" id="coupon_validity" name="coupon_validity"
                                                class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupon->coupon_validity }}">
                                            @error('coupon_validity')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="update" id="ajaxSubmit">
                                {{-- <button class="btn btn-primary" id="ajaxSubmit">Submit</button> --}}
                            </div>
                            </form>


                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>


    </div>




@endsection
