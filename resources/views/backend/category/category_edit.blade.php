@extends('admin.layouts.admin_master')

@section('title', 'Category')

@section('admin')



    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">

                    <h3 class="page-title"><a href="{{ route('all.category') }}">Category</a></h3>
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
                            <h3 class="box-title">Category Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="POST" action="{{ route('category.update', $category->id) }}">


                                    @csrf
                                    <div class="form-group">
                                        <h5>Category English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_name_en" name="category_name_en"
                                                class="form-control" value="{{ $category->category_name_en }}">
                                            @error('category_name_en')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_name_hin" name="category_name_hin"
                                                class="form-control" value="{{ $category->category_name_hin }}">
                                            @error('category_name_hin')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category Arabic<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_name_ar" name="category_name_ar"
                                                class="form-control"  value="{{ $category->category_name_ar }}">
                                            @error('category_name_ar')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category Icon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="category_icon" name="category_icon"
                                                class="form-control" value="{{ $category->category_icon }}">
                                            @error('category_icon')
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



    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault()

                var link = $(this).attr('href');

                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure you want to delete this record?',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: link,
                            data: {
                                '_method': 'get'
                            },
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'Yes'
                                });
                                window.location = '/category/view';
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
