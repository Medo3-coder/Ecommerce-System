@extends('admin.layouts.admin_master')

@section('title', 'Category Create')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
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
