@extends('admin.layouts.master')

@section('title', __('admin.products'))

@section('admin')

    <div class="row m-0 justify-content-between">
    </div>

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title"><a href="{{ url()->current() }}">{{ __('admin.products') }}</a></h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <a href="{{ route('products.create') }}"
                                class="btn bg-gradient-primary mr-1 mb-1 waves-effect waves-light float-right"><i
                                    class="feather icon-plus"></i> {{ __('admin.add') }}</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="position-relative">

        <div class="box-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('admin.name') }}</th>
                            <th>{{ __('admin.code') }}</th>
                            <th>{{ __('admin.qty') }}</th>
                            <th>{{ __('admin.selling_price') }}</th>
                            <th>{{ __('admin.status') }}</th>
                            <th>{{ __('admin.control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                {{-- <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y') }}</td> --}}
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->selling_price}}</td>
                                <td>
                                    @if ($product->status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                    @endif
                                </td>


                                <td class="product-action">
                                    <span class="text-primary pr-1"><a
                                            href="{{ route('products.show', ['id' => $product->id]) }}"><i
                                                class="fa fa-eye"></i></a></span>
                                    <span class="action-edit text-primary pr-1"><a
                                            href="{{ route('products.edit', ['id' => $product->id]) }}"><i
                                                class="fa fa-edit"></i></a></span>
                                    <a class="text-danger" id="delete"
                                        href="{{ route('products.delete', $product->id) }}"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>



    <div class="modal fade text-left" id="notify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel160">{{ __('admin.update_coupon_status') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('coupons.renew') }}" method="POST" enctype="multipart/form-data"
                        class="notify-form">
                        @csrf
                        <input type="hidden" name="id" class="coupon_id">
                        <input type="hidden" name="status" value="available">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">{{ __('admin.number_of_use') }}</label>
                                    <div class="controls">
                                        <input type="number" name="max_use" class="form-control"
                                            placeholder="{{ __('admin.enter_number_of_use') }}" required
                                            data-validation-required-message="{{ __('admin.enter_number_of_use') }}"
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
                                            data-validation-required-message="{{ __('admin.enter_number_of_use') }}"
                                            required
                                            data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            <option value>{{ __('admin.select_the_discount_state') }}</option>
                                            <option value="ratio">{{ __('admin.Percentage') }}</option>
                                            <option value="number">{{ __('admin.fixed_number') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">{{ __('admin.discount_value') }}</label>
                                    <div class="controls">
                                        <input type="number" name="discount" class="discount form-control"
                                            placeholder="{{ __('admin.type_the_value_of_the_discount') }}" required
                                            data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">{{ __('admin.larger_value_for_discount') }}</label>
                                    <div class="controls">
                                        <input readonly type="number" name="max_discount"
                                            class="max_discount form-control"
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
                                        <input type="date" name="expire_date" class="form-control" required
                                            data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit"
                                class="btn btn-primary send-notify-button">{{ __('admin.update') }}</button>
                            <button type="button" class="btn btn-primary"
                                data-dismiss="modal">{{ __('admin.cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script>
        $(document).on('click', '.open-coupon', function() {
            $('.coupon_id').val($(this).data('id'))
        })

        $(document).on('click', '.change-coupon-status', function() {
            $.ajax({
                type: "POST",
                url: "{{ route('coupons.renew') }}",
                data: {
                    id: $(this).data('id'),
                    status: $(this).data('status'),
                    expire_date: $(this).data('date'),
                    "_token": "{{ csrf_token() }}",
                },
                dataType: "json",
                success: (response) => {
                    $(this).parent().html(response.html)
                    Swal.fire({
                        position: 'top-start',
                        type: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500,
                        confirmButtonClass: 'btn btn-primary',
                        buttonsStyling: false,
                    })
                }
            });
        });
    </script>
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


    <script>
        $(document).ready(function() {
            $(document).on('submit', '.notify-form', function(e) {
                e.preventDefault();
                var url = $(this).attr('action')
                $.ajax({
                    url: url,
                    method: 'post',
                    data: new FormData($(this)[0]),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(".send-notify-button").html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                        ).attr('disable', true)
                    },
                    success: (response) => {
                        $(".text-danger").remove()
                        $('.store input').removeClass('border-danger')
                        $(".send-notify-button").html("{{ __('admin.update') }}").attr(
                            'disable', false)
                        $('#notify').modal('toggle');
                        Swal.fire({
                            position: 'top-start',
                            type: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500,
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })
                        $('#div_' + response.id).parent().html(response.html)
                    },
                    error: function(xhr) {
                        $(".send-notify-button").html("{{ __('admin.update') }}").attr(
                            'disable', false)
                        $(".text-danger").remove()
                        $('.notify-form input').removeClass('border-danger')

                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $('.notify-form input[name=' + key + ']').addClass(
                                'border-danger')
                            $('.notify-form input[name=' + key + ']').after(
                                `<span class="mt-5 text-danger">${value}</span>`);
                            $('.notify-form select[name=' + key + ']').after(
                                `<span class="mt-5 text-danger">${value}</span>`);
                        });
                    },
                });

            });
        });
    </script>


    @include('Admin.shared.deleteOne')
@endpush
