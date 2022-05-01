@extends('admin.layouts.admin_master')

@section('title', 'Product manage')

@section('admin')



    <div class="container-full">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title"><a href="{{ url()->current() }}">Product</a></h3>
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


                <div class="col-md-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product En</th>
                                            <th>Product Ar</th>
                                            <th>Product Quantity</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td><img src="{{ asset($item->product_thambnail) }}" style="width: 60px ; height:50px"></td>
                                                <td>{{ $item->product_name_en }}</td>
                                                <td>{{ $item->product_name_ar }}</td>
                                                <td>{{ $item->product_qty }}</td>
                                                <td>
                                                    <a href="{{ route('category.edit', $item->id) }}"
                                                        class="btn btn-info" title="Edit Data"> <i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('category.delete', $item->id) }}"
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






            </div>


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
