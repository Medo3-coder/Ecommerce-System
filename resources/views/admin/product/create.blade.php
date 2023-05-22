@extends('admin.layouts.master')

@section('title', __('admin.Add_products'))


@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">{{ __('admin.add') }}</h3>
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
                        <form method="POST" action="{{ route('products.store') }}" class="store form-horizontal"
                            novalidate>
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    @foreach (languages() as $lang)
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('site.name_' . $lang) }}</label>
                                                <div class="controls">
                                                    <input type="text" name="name[{{ $lang }}]"
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
                                                    <textarea type="text" name="short_desc[{{ $lang }}]" class="form-control"
                                                        placeholder="{{ __('site.write') . __('site.short_desc_' . $lang) }}" required
                                                        data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    @foreach (languages() as $lang)
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('site.short_desc_' . $lang) }}</label>
                                                <div class="controls">
                                                    <textarea type="text" name="short_desc[{{ $lang }}]" class="form-control"
                                                        placeholder="{{ __('site.write') . __('site.short_desc_' . $lang) }}" required
                                                        data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    @foreach (languages() as $lang)
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('site.long_desc_' . $lang) }}</label>
                                                <div class="controls">
                                                    <textarea type="text" name="long_desc[{{ $lang }}]" class="ckeditor form-control"
                                                        placeholder="{{ __('site.write') . __('site.long_desc_' . $lang) }}" required required
                                                        data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                    </textarea>
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
                                                        class="form-control" value="red,black,blue" data-role="tagsinput"
                                                        required
                                                        data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach









                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.selling_price') }}</label>
                                            <div class="controls">
                                                <input type="number" name="selling_price" class="discount form-control"
                                                    placeholder="{{ __('admin.type_the_value_of_the_selling_price') }}"
                                                    required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.selling_price') }}</label>
                                            <div class="controls">
                                                <input type="text" name="code" class="form-control generate_Code"
                                                    placeholder="{{ __('admin.type_the_value_of_the_selling_price') }}"
                                                    required
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
                                            <label for="first-name-column">{{ __('admin.discount_price') }}</label>
                                            <div class="controls">
                                                <input type="number" name="discount_price"
                                                    class="max_discount form-control"
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
                                                <input type="file" name="product_thambnail" class="form-control"
                                                    required onChange="mainThumbUrl(this)"
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">

                                                <img src="" id="mainThumb" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Multi Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="multi_img[]" class="form-control"
                                                    multiple="" id="multiImg" required="">
                                                @error('multi_img')
                                                    <span class="text-danger" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                                <div class="row" id="preview_img">

                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                        value="1">
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured"
                                                        value="1">
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
                                                        value="1">
                                                    <label for="checkbox_4">Special offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals"
                                                        value="1">
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-3">
                                <button type="submit"
                                    class="btn btn-primary mr-1 mb-1 submit_button">{{ __('admin.add') }}</button>
                                <a href="{{ url()->previous() }}" type="reset"
                                    class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.back') }}</a>
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->

                </div>
        </section>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection

@push('js')
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


    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>



    <script>
        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }


        $(document).on('click', '#generate_inField', function() {
            let result = makeid(8);
            $('.generate_Code').val(result);
        })
    </script>


    {{-- submit add form script --}}
    @include('admin.shared.submitAddForm')
    {{-- submit add form script --}}
@endpush
