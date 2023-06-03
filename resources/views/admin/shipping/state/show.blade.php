@extends('admin.layouts.master')

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
                                                <input type="text" value="{{ $state->getTranslations('name')[$lang] }}"
                                                    name="name[{{ $lang }}]" class="form-control"
                                                    placeholder="{{ __('site.write') . __('site.name_' . $lang) }}" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.division') }}</label>
                                        <div class="controls">
                                            <select name="division_id" class="select2 form-control" required
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                <option value>{{ __('admin.Select_the_division') }}</option>
                                                @foreach ($divisions as $division)
                                                    <option {{ $division->id == $state->division_id ? 'selected' : '' }}
                                                        value="{{ $division->id }}">{{ $division->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.district') }}</label>
                                        <div class="controls">
                                            <select name="division_id" class="select2 form-control" required
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                <option value>{{ __('admin.Select_the_division') }}</option>
                                                @foreach ($districts as $district)
                                                    <option {{ $district->id == $state->district_id ? 'selected' : '' }}
                                                        value="{{ $district->id }}">{{ $district->name }}
                                                    </option>
                                                @endforeach
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
