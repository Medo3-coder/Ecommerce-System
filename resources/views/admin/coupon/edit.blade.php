@extends('admin.layouts.master')

@section('title', __('admin.edit_coupons'))

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
                        <form method="POST" action="{{ route('coupons.update', ['id' => $coupon->id]) }}"
                            class="store form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.coupon_number') }}</label>
                                            <div class="controls">
                                                <input type="text" name="coupon_num" value="{{ $coupon->coupon_num }}"
                                                    class="form-control" placeholder="{{ __('admin.enter_coupon_number') }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.number_of_use') }}</label>
                                            <div class="controls">
                                                <input type="number" name="max_use" value="{{ $coupon->max_use }}"
                                                    class="form-control" placeholder="{{ __('admin.enter_number_of_use') }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.discount_type') }}</label>
                                            <div class="controls">
                                                <select name="type" class="select2 form-control" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                    <option value disabled>{{ __('admin.select_the_discount_state') }}</option>
                                                    <option {{ $coupon->type == 'ratio' ? 'selected' : '' }}
                                                        value="ratio">{{ __('admin.Percentage') }}</option>
                                                    <option {{ $coupon->type == 'number' ? 'selected' : '' }}
                                                        value="number">{{ __('admin.fixed_number') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.discount_value') }}</label>
                                            <div class="controls">
                                                <input type="number" value="{{ $coupon->discount }}" name="discount"
                                                    class="discount form-control"
                                                    placeholder="{{ __('admin.type_the_value_of_the_discount') }}" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label
                                                for="first-name-column">{{ __('admin.larger_value_for_discount') }}</label>
                                            <div class="controls">
                                                <input readonly type="number" name="max_discount"
                                                    value="{{ $coupon->max_discount }}" class="max_discount form-control"
                                                    placeholder="{{ __('admin.write_the_greatest_value_for_the_discount') }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.expiry_date') }}</label>
                                            <div class="controls">
                                                <input type="date"
                                                    value="{{ date('Y-m-d', strtotime($coupon->expire_date)) }}"
                                                    name="expire_date" class=" form-control" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
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
    <script>
        $(document).on('change', '.select2', function() {
            if ($(this).val() == 'ratio') {
                $('.max_discount').prop('readonly', false);
            } else {
                $('.max_discount').prop('readonly', true);
            }
        });
    </script>
    <script>
        $(document).on('keyup', '.discount', function() {
            if ($('.select2').val() == 'number') {
                $('.max_discount').val($(this).val());
            } else {
                $('.max_discount').val(null);
            }
        });
    </script>
    {{-- submit edit form script --}}
    @include('Admin.shared.submitEditForm')
    {{-- submit edit form script --}}
@endpush
