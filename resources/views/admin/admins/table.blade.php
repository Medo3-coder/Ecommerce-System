@extends('admin.layouts.master')

@section('title', 'Admins')

@section('admin')

    <div class="row m-0 justify-content-between">
    </div>

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title"><a href="{{ url()->current() }}">{{ __('admin.admins') }}</a></h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <a href="{{ route('admin.create') }}"
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
                            <th>{{ __('admin.date') }}</th>
                            <th>{{ __('admin.image') }}</th>
                            <th>{{ __('admin.name') }}</th>
                            <th>{{ __('admin.email') }}</th>
                            <th>{{ __('admin.phone') }}</th>
                            <th>{{ __('admin.status') }}</th>
                            <th>{{ __('admin.control') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>

                                <td>{{ $admin->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <img src="{{ asset($admin->avatar) }}" width="50px" height="50px" alt="">
                                </td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>
                                    @if ($admin->id != 1)
                                        @if ($admin->is_blocked)
                                            <span class="btn btn-sm round btn-outline-danger">
                                                {{ __('admin.Prohibited') }} <i class="la la-close font-medium-2"></i>
                                            </span>
                                            <span class="btn btn-sm round btn-outline-success block_user"
                                                data-id="{{ $admin->id }}">{{ __('admin.unblock') }}</span>
                                        @else
                                            <span class="btn btn-sm round btn-outline-success">
                                                {{ __('admin.Unspoken') }} <i class="la la-check font-medium-2"></i>
                                            </span>
                                            <span class="btn btn-sm round btn-outline-danger block_user"
                                                data-id="{{ $admin->id }}">{{ __('admin.block') }}</span>
                                        @endif
                                    @else
                                        --
                                    @endif
                                </td>


                                <td class="product-action">
                                    <span class="text-primary pr-1"><a
                                            href="{{ route('admin.show', ['id' => $admin->id]) }}"><i
                                                class="fa fa-eye"></i></a></span>
                                    <span class="action-edit text-primary pr-1"><a
                                            href="{{ route('admin.edit', ['id' => $admin->id]) }}"><i
                                                class="fa fa-edit"></i></a></span>
                                    @if ($admin->id != 1 && auth()->id() != $admin->id)
                                        <a class="text-danger" id="delete"
                                            href="{{ route('admin.delete', $admin->id) }}"><i
                                                class="fa fa-trash-o"></i></a>
                                    @endif
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
