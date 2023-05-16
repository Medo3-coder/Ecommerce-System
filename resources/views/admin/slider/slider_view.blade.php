@extends('admin.layouts.master')

@section('title', 'Sliders')
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



        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Slider List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Slider Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $item)
                                            <tr>
                                                <td><img src="{{ asset($item->slider_img) }}" alt="noImg"
                                                        style="width: 70px; height:40px"></td>


                                                <td>
                                                    @if ($item->title == null)
                                                        <span class="badge badge-pill badge-danger">No Title</span>
                                                    @else
                                                        {{ $item->title }}
                                                    @endif

                                                </td>
                                                <td>{{ $item->description }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td width="30%">

                                                    <a href="{{ route('slider.edit', $item->id) }}" class="btn btn-info"
                                                        title="Edit Data"> <i class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('slider.delete', $item->id) }}"
                                                        class="btn btn-danger" id="delete" title="Delete Data"> <i
                                                            class="fa fa-trash"></i></a>

                                                            @if ($item->status == 1)
                                                            <a href="{{ route('slider.inactive', $item->id) }}"
                                                                class="btn btn-danger" title="Inactive Now"> <i
                                                                    class="fa fa-arrow-down"></i> </a>
                                                        @else
                                                            <a href="{{ route('slider.active', $item->id) }}"
                                                                class="btn btn-success" title="Active Now"> <i
                                                                    class="fa fa-arrow-up"></i> </a>
                                                        @endif
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
                            <h3 class="box-title">Add Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">


                                    @csrf
                                    <div class="form-group">
                                        <h5>Slider Title<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="title" name="title" class="form-control">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Slider Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="description" name="description" class="form-control">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">User Image <span>
                                            </span></label>
                                        <input type="file" id="slider_img" name="slider_img" class="form-control" onChange="sliderchange(this)">
                                        <img src="" id="sliderShow" alt="">
                                        @error('slider_img')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add" id="ajaxSubmit">
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
    <!-- /.row -->
    </section>
    <!-- /.content -->

    </div>



    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault()
                that = this;
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
                                $(that).parent().parent().remove();

                                Swal.fire({
                                    icon: 'success',
                                    title: response,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'Yes'
                                }).then((result) => {
                                    // window.location = '/category/view';
                                    // $(that).parent().parent().remove();
                                    // window.location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>


    <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>





    <script>
        $(document).ready(function() {

            $('#add_brand').on('click', function(event) {
                event.preventDefault();
                var brand_name_en = $('#brand_name_en').val();
                var brand_name_hin = $('#brand_name_hin').val();
                var brand_name_ar = $('#brand_name_ar').val();
                var brand_image = $('#brand_image').val();
                if (brand_name_en != "" && brand_name_hin != "" && brand_name_ar != "" && brand_image !=
                    "") {
                    /*  $("#butsave").attr("disabled", "disabled"); */
                    $.ajax({
                        url: "/store",
                        type: "POST",
                        data: {
                            _token: $("#csrf").val(),
                            //   type: 1,
                            brand_name_en: brand_name_en,
                            brand_name_hin: brand_name_hin,
                            brand_name_ar: brand_name_ar,
                            brand_image: brand_image
                        },
                        cache: false,
                        success: function(dataResult) {
                            console.log(dataResult);
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                window.location = "/brand/view";
                            } else if (dataResult.statusCode == 201) {
                                alert("Error occured !");
                            }

                        }
                    });
                } else {
                    alert('Please fill all the field !');
                }
            });
        });
    </script>



<script type="text/javascript">

  function sliderchange(input)
  {
      if(input.files && input.files[0])
      {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $('#sliderShow').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
      }

  }

</script>







@endsection
