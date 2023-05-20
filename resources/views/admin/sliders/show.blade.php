@extends('admin.layouts.master')

@section('title', __('admin.view_of_banner'))

@section('admin')

    <div class="container-full">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">{{ __('admin.show') }}</h3>
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
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form class="store form-horizontal">
                        <div class="col-12">
                            <div class="row">
                                <div class="imgMontg col-12 text-center">
                                    <div class="form-control">
                                        <img src="{{ $slider->image }}" width="100px" height="100px" alt="">
                                    </div>
                                </div>

                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.title_' . $lang) }}</label>
                                            <div class="controls">
                                                <input type="text" value="{{ $slider->getTranslations('title')[$lang] }}"
                                                    name="title[{{ $lang }}]" class="form-control"
                                                    placeholder="{{ __('site.write') . __('site.title_' . $lang) }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.description_' . $lang) }}</label>
                                            <div class="controls">
                                                <input type="text"
                                                    value="{{ $slider->getTranslations('description')[$lang] }}"
                                                    name="description[{{ $lang }}]" class="form-control"
                                                    placeholder="{{ __('site.write') . __('site.description_' . $lang) }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.status') }}</label>
                                        <div class="controls">
                                            <select name="status" class="select2 form-control" required
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                <option {{ $slider->status == 1 ? 'selected' : '' }} value="1">
                                                    {{ __('admin.active') }}</option>
                                                <option {{ $slider->status == 0 ? 'selected' : '' }} value="0">
                                                    {{ __('admin.inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <a href="{{ url()->previous() }}" type="reset"
                                        class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.back') }}</a>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
@endsection


@push('js')
    <script>
        $('.store input').attr('disabled', true)
        $('.store textarea').attr('disabled', true)
        $('.store select').attr('disabled', true)
    </script>
@endpush
