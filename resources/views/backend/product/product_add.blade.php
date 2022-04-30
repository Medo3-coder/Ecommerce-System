@extends('admin.layouts.admin_master')
@section('title', 'Add Product')



@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form novalidate>
                                <div class="row">
                                    <div class="col-12">


                                        <div class="row"> {{-- 1st Row --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control">
                                                            <option selected="" disabled="">Select Brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}">
                                                                    {{ $brand->brand_name_en }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('brand_id')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option selected="" disabled="">Select Your Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->category_name_en }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control">
                                                            <option selected="" disabled="">Select SubCategory</option>
                                                        </select>
                                                        @error('subcategory_id')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>

                                        </div> {{-- end 1st Row --}}


                                        {{-- 2nd Row --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Sub SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" class="form-control">
                                                            <option selected="" disabled="">Select SubCategory</option>
                                                        </select>
                                                        @error('subsubcategory_id')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_en" class="form-control">
                                                        @error('product_name_en')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Name Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_hin" class="form-control">
                                                        @error('product_name_hin')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>

                                        </div> {{-- end 2nd Row --}}



                                        {{-- 3rd Row --}}
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Name Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name_ar" class="form-control">
                                                        @error('product_name_ar')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" class="form-control">
                                                        @error('product_qty')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Tag En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_en" class="form-control"
                                                            value="loresm ipsum" data-role="tagsinput">
                                                        @error('product_tags_en')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>

                                        </div> {{-- end 3rd Row --}}



                                        {{-- 4th Row --}}
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Tag Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_hin" class="form-control"
                                                            value="loresm ipsum" data-role="tagsinput">
                                                        @error('product_tags_hin')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Tag Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_ar" class="form-control"
                                                            value="loresm ipsum" data-role="tagsinput">
                                                        @error('product_tags_ar')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control">
                                                        @error('product_code')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>

                                        </div> {{-- end 4th Row --}}




                                        {{-- 5th Row --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control"
                                                            value="small,medium,larg" data-role="tagsinput">
                                                        @error('product_size_en')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>




                                            </div>

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Size Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_hin" class="form-control"
                                                            value="small,medium,larg" data-role="tagsinput">
                                                        @error('product_size_hin')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size_ar" class="form-control"
                                                            value="كبير,وسط,صغير" data-role="tagsinput">
                                                        @error('product_size_hin')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>

                                        </div> {{-- end 5th Row --}}



                                        {{-- 6th Row --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_en" class="form-control"
                                                            value="red,black,blue" data-role="tagsinput">
                                                        @error('product_color_en')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>




                                            </div>

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Color Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_hin" class="form-control"
                                                            value="red,black,blue" data-role="tagsinput">
                                                        @error('product_color_hin')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_color_ar" class="form-control"
                                                            value="احمر,اسود ,ازرق" data-role="tagsinput">
                                                        @error('product_color_ar')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>

                                        </div> {{-- end 6th Row --}}


                                        {{-- 7th Row --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control">
                                                        @error('selling_price')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control">
                                                        @error('discount_price')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thambnail" class="form-control">
                                                        @error('product_thambnail')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>

                                        </div> {{-- end 7th Row --}}



                                        {{-- 8th Row --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Short Description Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_ar" id="textarea" class="form-control" required placeholder="Textarea text">

                                                </textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Short Description English <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text">

                                                </textarea>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Short Description Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_hin" id="textarea" class="form-control" required placeholder="Textarea text">

                                                </textarea>
                                                    </div>
                                                </div>


                                            </div>

                                        </div> {{-- end 8th Row --}}


                                        {{-- 9th Row --}}
                                        <div class="row">
                                            <div class="col-md-4">


                                                <div class="form-group">
                                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
                                                        This is my textarea to be replaced with CKEditor.
                                                  </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Long Description Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="long_descp_hin" rows="10" cols="80">
                                                        This is my textarea to be replaced with CKEditor.
                                                  </textarea>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Long Description Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor3" name="long_descp_ar" rows="10" cols="80">
                                                        This is my textarea to be replaced with CKEditor.
                                                  </textarea>
                                                    </div>
                                                </div>


                                            </div>

                                        </div> {{-- end 9th Row --}}



                                        {{-- 10th Row --}}
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Multi Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" class="form-control">
                                                        @error('multi_img')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-4">

                                                {{-- <div class="form-group">
                                                <h5>Long Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
                                                        This is my textarea to be replaced with CKEditor.
                                                  </textarea>
                                                </div>
                                            </div> --}}

                                            </div>


                                            <div class="col-md-4">
                                                {{-- <div class="form-group">
                                                <h5>Long Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="long_descp_hin" rows="10" cols="80">
                                                        This is my textarea to be replaced with CKEditor.
                                                  </textarea>
                                                </div>
                                            </div> --}}

                                            </div>

                                        </div> {{-- end 10th Row --}}

                                        <hr>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                    <label for="checkbox_4">Special offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').empty();
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .sub_category_name_en +
                                    '</option>"');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            });






            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name_en +
                                    '</option>"');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            })






        });
    </script>

@endsection
