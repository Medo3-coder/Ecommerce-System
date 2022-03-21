@extends('admin.admin_master')

@section('title', 'Brands')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title"><a href="{{ url()->current() }}">Brands</a></h3>
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


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Brand En</th>
                                            <th>Brand Ar</th>
                                            <th>Brand Hin</th>
                                            <th>Image</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brand as $item)
                                            <tr>
                                                <td>{{ $item->brand_name_en }}</td>
                                                <td>{{ $item->brand_name_hin }}</td>
                                                <td>{{ $item->brand_name_ar }}</td>
                                                <td><img src="{{ asset($item->brand_image) }}" alt="noImg"
                                                        style="width: 70px; height:40px"></td>
                                                <td>
                                                    <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-info"
                                                        title="Edit Data"> <i class="fa fa-pencil"></i> </a>

                                                    <a   href="{{ route('brand.delete', $item->id) }}" class="btn btn-danger"
                                                        id="delete" title="Delete Data"> <i class="fa fa-trash"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach



                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <!-- /.Add Brand form -->


                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">

                                    @csrf
                                    <div class="form-group">
                                        <h5>Brand Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control">
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
                                            <input type="text" name="brand_name_hin" class="form-control">
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
                                            <input type="text" name="brand_name_ar" class="form-control">
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
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add" id="add">
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
                                }).then((result) => {
                                    window.location = '/brand/view';
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>




@endsection
