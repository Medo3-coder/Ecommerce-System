@extends('admin.layouts.master')

@section('title', 'Category Edit')

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
                        <form method="POST" action="{{ route('categories.update', ['id' => $category->id]) }}"
                            class="store form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <div class="row">
                                    @foreach (languages() as $lang)
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('site.name_' . $lang) }}</label>
                                                <div class="controls">
                                                    <input type="text"
                                                        value="{{ $category->getTranslations('name')[$lang] }}"
                                                        name="name[{{ $lang }}]" class="form-control"
                                                        placeholder="{{ __('site.write') . __('site.name_' . $lang) }}"
                                                        required
                                                        data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach



                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.select_main_section') }}</label>
                                            <div class="controls">
                                                <select name="parent_id" class="select2 form-control">
                                                    <option value>{{ __('admin.select_section') }}</option>

                                                    @foreach ($categories as $mainCategory)
                                                        <option
                                                            {{ $mainCategory->id == $category->parent_id ? 'selected' : '' }}
                                                            value="{{ $mainCategory->id }}">{{ $mainCategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.update')}}</button>
                                        <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
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