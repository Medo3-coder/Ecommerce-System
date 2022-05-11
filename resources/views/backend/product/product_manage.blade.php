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
                                            <th>Product Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td><img src="{{ asset($item->product_thambnail) }}"
                                                        style="width: 60px ; height:50px"></td>
                                                <td>{{ $item->product_name_en }}</td>
                                                <td>{{ $item->selling_price }} $</td>
                                                <td>{{ $item->product_qty }} pice</td>
                                                <td>
                                                    @if ($item->discount_price == null)
                                                        <span class="badge badge-pill badge-danger"> No Discount</span>
                                                    @else
                                                        @php
                                                            // $amount = $item->selling_price - $item->discount_price;
                                                            $discount_percent = ($item->discount_price/ $item->selling_price) * 100;
                                                            // $rateOFDicount = 100 - $discount_percent;
                                                        @endphp

                                                        <span class="badge badge-pill badge-success">{{ round($discount_percent)  }}%</span>
                                                    @endif

                                                </td>
                                                {{-- <td>{{ $item->status }}</td> --}}
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td width="30%">

                                                    <a href="{{ route('show-product', $item->id) }}"
                                                        class="btn btn-primary" title="Product Details"> <i
                                                            class="fa fa-eye"></i> </a>

                                                    <a href="{{ route('edit-product', $item->id) }}"
                                                        class="btn btn-info" title="Edit Data"> <i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('product.delete', $item->id) }}"
                                                        class="btn btn-danger" id="delete" data-id="{{ $item->id }}"
                                                        title="Delete Data"> <i class="fa fa-trash"></i></a>

                                                    @if ($item->status == 1)
                                                        <a href="{{ route('product.inactive', $item->id) }}"
                                                            class="btn btn-danger" title="Inactive Now"> <i
                                                                class="fa fa-arrow-down"></i> </a>
                                                    @else
                                                        <a href="{{ route('product.active', $item->id) }}"
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



@endsection
