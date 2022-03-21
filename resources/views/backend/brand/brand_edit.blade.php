@extends('admin.admin_master')

@section('title', 'Brands')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title"><a href="{{ route('all.brand') }}">Brands</a></h3>
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


                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="POST" action="{{ route('brand.update' , $brand->id) }}"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="form-group">
                                        <h5>Brand Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control" value="{{ $brand->brand_name_en }}">
                                            @error('brand_name_en')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <h5>Brand Name hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_hin" class="form-control" value="{{ $brand->brand_name_hin }}">
                                            @error('brand_name_hin')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <h5>Brand Name Arabic<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_ar" class="form-control" value="{{ $brand->brand_name_ar }}">
                                            @error('brand_name_ar')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">User Image <span>
                                            </span></label>
                                        <input type="file" name="brand_image" class="form-control">
                                        @error('brand_image')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    </div>

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>



@endsection
