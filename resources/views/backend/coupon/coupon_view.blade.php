@extends('admin.layouts.admin_master')

@section('title', 'Coupons')

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
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title"><a href="{{ url()->current() }}">Coupons</a></h3>
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
                            <h3 class="box-title">Coupon List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Coupon Name</th>
                                            <th>Coupon Discount</th>
                                            <th>Validity</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $item)
                                            <tr>
                                                <td>{{ $item->coupon_name }}</td>
                                                <td>{{ $item->coupon_discount }}%</td>
                                                <td>
                                                    {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}
                                                    {{-- {{ $item->coupon_validity }} --}}
                                                </td>
                                                <td>
                                                    @if ($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                        <span class="badge badge-pill badge-success">Valid</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger"> Invalid</span>
                                                      @endif
                                                </td>
                                                <td width="20%">
                                                    <a href="{{ route('coupon.edit', $item->id) }}" class="btn btn-info"
                                                        title="Edit Data"> <i class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('coupon.delete', $item->id) }}"
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
                            <h3 class="box-title">Coupon List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>

                                <form method="POST" action="{{ route('coupon.store') }}" id="ajaxform">


                                    @csrf
                                    <div class="form-group">
                                        <h5>Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="coupon_name" name="coupon_name" class="form-control">
                                            @error('coupon_name')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon Discount (%)<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="integer" id="coupon_discount" name="coupon_discount"
                                                class="form-control">
                                            @error('coupon_discount')
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
                                                class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                            @error('coupon_validity')
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
                                '_method': 'get',
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
                                    window.location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
