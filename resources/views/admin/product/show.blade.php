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

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.brands') }}</label>
                                        <div class="controls">
                                            <select name="brand_id" class="form-control" required>
                                                <option value="" disabled>{{ __('admin.select_brands') }}
                                                </option>
                                                @foreach ($brands as $brand)
                                                    <option {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                                                        value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.categories') }}</label>
                                        <div class="controls">
                                            <select name="category_id" class="form-control" required>
                                                <option value="" disabled>{{ __('admin.select_categories') }}
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.subcategory') }}</label>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control">
                                                <option>
                                                    {{ __('admin.select_subcategories') }}</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.subSubcategory') }}</label>
                                        <div class="controls">
                                            <select name="subsubcategory_id" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option
                                                        {{ $product->subcategory_id == $category->parent_id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.name_' . $lang) }}</label>
                                            <div class="controls">
                                                <input type="text" name="name[{{ $lang }}]"
                                                    value="{{ $product->getTranslations('name')[$lang] }}"
                                                    class="form-control"
                                                    placeholder="{{ __('site.write') . __('site.name_' . $lang) }}"
                                                    required
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
                                                <input type="text" name="slug[{{ $lang }}]"
                                                    value="{{ $product->getTranslations('slug')[$lang] }}"
                                                    class="form-control"
                                                    placeholder="{{ __('site.write') . __('site.slug_' . $lang) }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.tags_' . $lang) }}</label>
                                            <div class="controls">
                                                <input type="text" name="tags[{{ $lang }}]"
                                                    value="{{ $product->getTranslations('tags')[$lang] }}"
                                                    class="form-control"
                                                    placeholder="{{ __('site.write') . __('site.tags_' . $lang) }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.short_desc_' . $lang) }}</label>
                                            <div class="controls">
                                                <textarea type="text" name="short_desc[{{ $lang }}]"
                                                    class="form-control"placeholder="{{ __('site.write') . __('site.short_desc_' . $lang) }}"
                                                    requireddata-validation-required-message="{{ __('admin.this_field_is_required') }}">{{ $product->getTranslations('short_desc')[$lang] }} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.color_' . $lang) }}</label>
                                            <div class="controls">
                                                <input type="text" name="color[{{ $lang }}]"
                                                    value="{{ $product->getTranslations('color')[$lang] }}"
                                                    class="form-control" data-role="tagsinput" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                                @foreach (languages() as $lang)
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('site.long_desc_' . $lang) }}</label>
                                            <div class="controls">
                                                <textarea type="text" name="long_desc[{{ $lang }}]"
                                                    class="ckeditor form-control"placeholder="{{ __('site.write') . __('site.long_desc_' . $lang) }}" required required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}"> {{ $product->getTranslations('long_desc')[$lang] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.selling_price') }}</label>
                                        <div class="controls">
                                            <input type="number" name="selling_price" class="discount form-control"
                                                value="{{ $product->selling_price }}"
                                                placeholder="{{ __('admin.write_selling_price') }}" required
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.product_code') }}</label>
                                        <div class="controls">
                                            <input type="text" name="code" class="form-control generate_Code"
                                                value="{{ $product->code }}"
                                                placeholder="{{ __('admin.product_code') }}" required
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            <span class="input-group-append">
                                                <button class="btn btn-primary" type="button" id="generate_inField">
                                                    Generate </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.qty') }}</label>
                                        <div class="controls">
                                            <input type="number" name="qty" class="form-control"
                                                value="{{ $product->qty }}" placeholder="{{ __('admin.qty') }}" required
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.discount_price') }}</label>
                                        <div class="controls">
                                            <input type="number" name="discount_price" class="max_discount form-control"
                                                value="{{ $product->discount_price }}"
                                                placeholder="{{ __('admin.write_the_greatest_value_for_discount_price') }}"
                                                required
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.product_thambnail') }}</label>
                                        <div class="controls">
                                            <input type="file" name="product_thambnail" class="form-control" required
                                                onChange="mainThumbUrl(this)"
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            <img src="{{ $product->product_thambnail }}" id="mainThumb" alt=""
                                                width="100">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Multi Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="images[]" class="form-control" multiple=""
                                                id="multiImg"
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            {{-- fix later --}}
                                            {{-- @foreach ($productImages as $image)
                                            <img src="{{ $image->image }}">

                                            @endforeach --}}
                                            <div class="row" id="preview_img">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{ __('admin.status') }}</label>
                                        <div class="controls">
                                            <select name="status" class="select2 form-control" required
                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                <option value>{{ __('admin.status') }}</option>
                                                <option {{ $product->status == 0 ? 'selected' : '' }} value="0">
                                                    InActive </option>
                                                <option {{ $product->status == 1 ? 'selected' : '' }} value="1">Active
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                            {{ $product->hot_deals == 1 ? 'checked' : '' }} value="1">
                                                        <label for="checkbox_2">Hot Deals</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="featured"
                                                            {{ $product->featured == 1 ? 'checked' : '' }} value="1">
                                                        <label for="checkbox_3">Featured</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="special_offer"
                                                            {{ $product->special_offer == 1 ? 'checked' : '' }}
                                                            value="1">
                                                        <label for="checkbox_4">Special offer</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="special_deals"
                                                            {{ $product->special_deals == 1 ? 'checked' : '' }}
                                                            value="1">
                                                        <label for="checkbox_5">Special Deals</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>
                            <div class="col-12 d-flex justify-content-center mt-3">
                                <a href="{{ url()->previous() }}" type="reset"
                                    class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.back') }}</a>
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


    <script>
        function getSubcategories(id) {
            $('select[name="subcategory_id"]').html('')
            $.ajax({
                url: "{{ url('admin/subcategories') }}" + '/' + id,
                type: 'GET',
                success: function(data) {

                    for (let i = 0; i < data.length; i++) {
                        $('select[name="subcategory_id"]').append(
                            `<option value="${ data[i].id }">${ data[i].name['{{ lang() }}'] }</option>`
                        )
                    }
                }
            })
        }

        $(document).ready(function() {
            var category_id = $('select[name="category_id"]').val();
            getSubcategories(category_id)
        })
        $('select[name="category_id"]').change(function() {
            var id = $(this).val();
            getSubcategories(id)
        })
    </script>


    <script type="text/javascript">
        function mainThumbUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThumb').attr('src', e.target.result).width(90).height(90);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
