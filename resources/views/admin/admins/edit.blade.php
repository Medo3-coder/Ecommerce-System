@extends('admin.layouts.master')

@section('title', 'Admin Edit')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">{{ __('admin.edit') }}</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">

                                {{-- <li class="breadcrumb-item active" aria-current="page">Form Validation</li> --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col">
                        <form method="POST" action="{{ route('admin.update', ['id' => $admin->id]) }}"
                            class="store form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.name') }}</label>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ $admin->name }}"
                                                    class="form-control" placeholder="{{ __('admin.enter_the_name') }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.phone') }}</label>
                                            <div class="controls">
                                                <input type="number" name="phone" value="{{ $admin->phone }}"
                                                    class="form-control" placeholder="{{ __('admin.enter_the_phone') }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.email') }}</label>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{ $admin->email }}"
                                                    class="form-control" placeholder="{{ __('admin.enter_the_email') }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}"
                                                    data-validation-email-message="{{ __('admin.email_formula_is_incorrect') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.password') }}</label>
                                            <div class="controls">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.status') }}</label>
                                            <div class="controls">
                                                <select name="is_blocked" class="select2 form-control" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                    <option value>{{ __('admin.Select_the_blocking_status') }}</option>
                                                    <option {{ $admin->is_blocked == 1 ? 'selected' : '' }} value="1">
                                                        {{ __('admin.Prohibited') }}</option>
                                                    <option {{ $admin->is_blocked == 0 ? 'selected' : '' }} value="0">
                                                        {{ __('admin.Unspoken') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 col-12">
                                        <div class="form-group">
                                          <label for="first-name-column">{{  __('admin.Validity') }}</label>
                                          <div class="controls">
                                            <select name="role_id" class="select2 form-control" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required')  }}">
                                              <option value>{{  __('admin.Select_the_validity') }}</option>
                                              @foreach ($roles as $role)
                                                <option {{ $role->id == $admin->role_id ? 'selected' : '' }}
                                                        value="{{ $role->id }}">{{ $role->name }}
                                                </option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                      </div> --}}

                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">{{ __('admin.image') }}</label>
                                        <input type="file" value="{{ $admin->avatar }}" name="avatar"
                                            class="form-control">
                                    </div>

                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 submit_button">{{ __('admin.update') }}</button>
                                        <a href="{{ url()->previous() }}" type="reset"
                                            class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.back') }}</a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.box-body -->
    </div>


@endsection


@push('js')
    {{-- submit edit form script --}}
    @include('Admin.shared.submitEditForm')
    {{-- submit edit form script --}}
@endpush
