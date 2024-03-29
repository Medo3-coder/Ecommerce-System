@extends('admin.layouts.master')

@section('title', __('admin.state'))

@section('admin')

    <div class="row m-0 justify-content-between">
    </div>

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title"><a href="{{ url()->current() }}">{{ __('admin.state') }}</a></h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <a href="{{ route('state.create') }}"
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
                            <th>{{ __('admin.shipping_division') }}</th>
                            <th>{{ __('admin.district') }}</th>
                            <th>{{ __('admin.control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($states as $state)
                            <tr>

                                <td>{{ $state->name }}</td>
                                <td>{{ $state->division->name }}</td>
                                <td>{{ $state->district->name }}</td>

                                <td class="product-action">
                                    <span class="text-primary pr-1"><a
                                            href="{{ route('state.show', ['id' => $state->id]) }}"><i
                                                class="fa fa-eye"></i></a></span>
                                    <span class="action-edit text-primary pr-1"><a
                                            href="{{ route('state.edit', ['id' => $state->id]) }}"><i
                                                class="fa fa-edit"></i></a></span>
                                    <a class="text-danger" id="delete"
                                        href="{{ route('state.delete', $state->id) }}"><i
                                            class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


@endsection

@push('js')
    @include('Admin.shared.deleteOne')
@endpush
