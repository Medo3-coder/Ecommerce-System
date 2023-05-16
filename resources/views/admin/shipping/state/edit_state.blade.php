@extends('admin.layouts.master')

@section('title', 'District Edit')

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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">

                    <h3 class="page-title"><a href="{{ route('manage-district') }}">District</a></h3>
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
                            <h3 class="box-title">Division Edit</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="POST" action="{{ route('state.update', $state->id) }}">


                                    <div class="form-group">
                                        <h5>Division Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control">
                                                <option selected="" disabled="">Select Your Division</option>
                                                @foreach ($division as $div)
                                                    <option value="{{ $div->id }}" {{ $div->id == $state->division_id  ? 'selected' : ''  }}>{{ $div->division_name }}</option>
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
                                                @foreach ($district as $dis)
                                                    <option value="{{ $dis->id }}" {{ $dis->id == $state->district_id ? 'selected' : '' }}>
                                                        {{ $dis->district_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                            <span class="text-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                      </div>
                                    </div>




                                    @csrf
                                    <div class="form-group">
                                        <h5>State name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="state_name" name="state_name" value="{{ $state->state_name}}" class="form-control">
                                            @error('state_name')
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




@endsection
