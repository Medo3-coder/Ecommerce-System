@extends('admin.layouts.master')

@section('title', 'Edit SubCategory')

@section('admin')



    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">

                    <h3 class="page-title"><a href="{{ route('all.subcategory') }}">SubCategory</a></h3>
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
                            <h3 class="box-title">SubCategory Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="POST" action="{{ route('subcategory.update', $subcategory->id) }}">


                                    @csrf
                                    <div class="form-group">
                                        <h5>Category English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="sub_category_name_en" name="sub_category_name_en"
                                                class="form-control" value="{{ $subcategory->sub_category_name_en }}">
                                            @error('sub_category_name_en')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="sub_category_name_hin" name="sub_category_name_hin"
                                                class="form-control" value="{{ $subcategory->sub_category_name_hin }}">
                                            @error('sub_category_name_hin')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category Arabic<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="sub_category_name_ar" name="sub_category_name_ar"
                                                class="form-control" value="{{ $subcategory->sub_category_name_ar }}">
                                            @error('sub_category_name_ar')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option selected="" disabled="">Select Your Category</option>
                                                @foreach ($category as $categories)
                                                    <option value="{{ $categories->id }}"
                                                        {{ $categories->id == $subcategory->category_id ? 'selected' : '' }}>
                                                        {{ $categories->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="update"
                                    id="ajaxSubmit">
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
