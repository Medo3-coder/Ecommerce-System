@extends('admin.layouts.admin_master')

@section('title', 'SubCategory')

@section('admin')



    <div class="container-full">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title"><a href="{{ url()->current() }}">Category</a></h3>
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
                            <h3 class="box-title">SubCategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Category En</th>
                                            <th>Category Hin</th>
                                            <th>Category Ar</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subCategory as $item)
                                            <tr>
                                                <td>{{ $item->category->category_name_en ?? '' }}</td>
                                                {{-- <td>{{ $item['category']['category_name_en']  }}</td> --}}
                                                <td>{{ $item->sub_category_name_en }}</td>
                                                <td>{{ $item->sub_category_name_hin }}</td>
                                                <td>{{ $item->sub_category_name_ar }}</td>
                                                <td width="30%">
                                                    <a href="{{ route('subcategory.edit', $item->id) }}"
                                                        class="btn btn-info" title="Edit Data"> <i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('subcategory.delete', $item->id) }}"
                                                        class="btn btn-danger" id="delete" data-id="{{ $item->id }}"
                                                        title="Delete Data"> <i class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Add SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <span class="success"
                                    style="color:green; margin-top:10px; margin-bottom: 10px;"></span>

                                <form method="POST" action="{{ route('subcategory.store') }}" id="ajaxform">


                                    @csrf
                                    <div class="form-group">
                                        <h5>Sub Category English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="sub_category_name_en" name="sub_category_name_en"
                                                class="form-control">
                                            @error('sub_category_name_en')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub Category hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="sub_category_name_hin" name="sub_category_name_hin"
                                                class="form-control">
                                            @error('sub_category_name_hin')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub Category Arabic<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="sub_category_name_ar" name="sub_category_name_ar"
                                                class="form-control">
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
                                                    <option value="{{ $categories->id }}">{{ $categories->category_name_en }}</option>
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
                                <input type="submit" class="btn btn-rounded btn-primary mb-5 save-data" value="Add">
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



    <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>



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
                                $(that).parent().parent().remove()
                                Swal.fire({
                                    icon: 'success',
                                    title: response,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'Yes'
                                }).then((result) => {
                                    // window.location = '/category/view';
                                    // that.parent().parent().remove()
                                    // window.location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>


    {{-- <script type="text/javascript">
        $(".save-data").click(function(event) {
            event.preventDefault();



            let category_name_en = $("input[name=category_name_en]").val();
            let category_name_hin = $("input[name=category_name_hin]").val();
            let category_name_ar = $("input[name=category_name_ar]").val();
            let category_icon = $("input[name=category_icon]").val();


            $.ajax({

                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('category.store') }}",
                data: {
                    category_name_en: category_name_en,
                    category_name_hin: category_name_hin,
                    category_name_ar: category_name_ar,
                    category_icon: category_icon,

                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.success,

                    })

                    window.location.reload();
                },
                error: function(error) {
                    alert(data.error);
                }
            });
        });
    </script> --}}
@endsection
