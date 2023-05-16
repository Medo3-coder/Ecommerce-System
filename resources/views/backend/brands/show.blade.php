@extends('admin.layouts.admin_master')

@section('title', 'Show')

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
                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.name_' . $lang) }}</label>
                                            <div class="controls">
                                                <input type="text"
                                                    value="{{ $brand->getTranslations('name')[$lang] }}"
                                                    name="name[{{ $lang }}]" class="form-control"
                                                    placeholder="{{ __('site.write') . __('site.name_' . $lang) }}" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.slug_' . $lang) }}</label>
                                            <div class="controls">
                                                <input type="text"
                                                    value="{{ $brand->getTranslations('slug')[$lang] }}"
                                                    name="slug[{{ $lang }}]" class="form-control"
                                                    placeholder="{{ __('site.write') . __('site.slug_' . $lang) }}" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div>
                                    <img src="{{ $brand->image }}" width="100px" height="100px" alt="">
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
