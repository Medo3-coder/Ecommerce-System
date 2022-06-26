@extends('admin.layouts.admin_master')

@section('title', 'State')

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
                    <h3 class="page-title"><a href="{{ url()->current() }}">State</a></h3>
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
                            <h3 class="box-title">State List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Division Name </th>
                                            <th>District Name </th>
                                            <th>State Name </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($state as $item)
                                            <tr>
                                                <td>{{ $item->division->division_name }}</td>
                                                <td>{{ $item->district->district_name }}</td>
                                                <td>{{ $item->state_name }}</td>


                                                <td width="40%">
                                                    <a href="{{ route('state.edit', $item->id) }}" class="btn btn-info"
                                                        title="Edit Data"> <i class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('state.delete', $item->id) }}"
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
                            <h3 class="box-title">Division List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>

                                <form method="POST" action="{{ route('state.store') }}" id="ajaxform">


                                    @csrf

                                    <div class="form-group">
                                        <h5>Division Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control">
                                                <option selected="" disabled="">Select Your Division</option>
                                                @foreach ($division as $div)
                                                    <option value="{{ $div->id }}">{{ $div->division_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                      </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>District Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="district_id" class="form-control">
                                                <option selected="" disabled="">Select Your District</option>
                                                @foreach ($district as $div)
                                                    <option value="{{ $div->id }}">{{ $div->district_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                      </div>
                                    </div>



                                    <div class="form-group">
                                        <h5>State name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="state_name" name="state_name" class="form-control">
                                            @error('state_name')
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
