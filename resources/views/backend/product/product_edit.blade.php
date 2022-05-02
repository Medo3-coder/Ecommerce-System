@extends('admin.layouts.admin_master')
@section('title', 'Edit Product')


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
                            @if (session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get('error') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <form method="POST" action="{{ route('update-product', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
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
                                                                <option value="{{ $brand->id }}"
                                                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
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
                                                                <option value="{{ $category->id }}"
                                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>

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
                                                            <option selected="" disabled="">Select Your SubCategory</option>
                                                            @foreach ($subcategory as $subcat)
                                                                <option value="{{ $subcat->id }}"
                                                                    {{ $subcat->id == $product->subcategory_id ? 'selected' : '' }}>
                                                                    {{ $subcat->sub_category_name_en }}
                                                                </option>
                                                            @endforeach

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
                                                            <option selected="" disabled="">Select Your Sub SubCategory
                                                            </option>
                                                            @foreach ($sub_Subcategory as $subsubcat)
                                                                <option value="{{ $subsubcat->id }}"
                                                                    {{ $subsubcat->id == $product->subsubcategory_id ? 'selected' : '' }}>
                                                                    {{ $subsubcat->subsubcategory_name_en }}
                                                                </option>
                                                            @endforeach

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
                                                        <input type="text" name="product_name_en"
                                                            value="{{ $product->product_name_en }}"
                                                            class="form-control" required="">
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
                                                        <input type="text" name="product_name_hin"
                                                            value="{{ $product->product_name_hin }}"
                                                            class="form-control" required="">
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
                                                        <input type="text" name="product_name_ar"
                                                            value="{{ $product->product_name_ar }}"
                                                            class="form-control" required="">
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
                                                        <input type="text" name="product_qty"
                                                            value="{{ $product->product_qty }}" class="form-control"
                                                            required="">
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
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code"
                                                            value="{{ $product->product_code }}"
                                                            class="form-control generate_Code" required="">

                                                        <span class="input-group-append">
                                                            <button class="btn btn-primary" type="button"
                                                                id="generate_inField"> Generate </button>


                                                        </span>



                                                        @error('product_code')
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
                                                            value="{{ $product->product_tags_hin }}"
                                                            data-role="tagsinput" required="">
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
                                                            value="{{ $product->product_tags_ar }}" data-role="tagsinput"
                                                            required="">
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
                                                    <h5>Product Tag En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_tags_en" class="form-control"
                                                            value="{{ $product->product_tags_en }}" data-role="tagsinput"
                                                            required="">
                                                        @error('product_tags_en')
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
                                                            value="{{ $product->product_size_en }}" data-role="tagsinput"
                                                            required="">
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
                                                            value="{{ $product->product_size_hin }}"
                                                            data-role="tagsinput" required="">
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
                                                            value="{{ $product->product_size_ar }}" data-role="tagsinput"
                                                            required="">
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
                                                            value="{{ $product->product_color_en }}"
                                                            data-role="tagsinput" required="">
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
                                                            value="{{ $product->product_color_hin }}"
                                                            data-role="tagsinput" required="">
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
                                                            value="{{ $product->product_color_ar }}"
                                                            data-role="tagsinput" required="">
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
                                                        <input type="text" name="selling_price" class="form-control"
                                                            required="" value="{{ $product->selling_price }}">
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
                                                        <input type="text" name="discount_price" class="form-control"
                                                            required="" value="{{ $product->discount_price }}">
                                                        @error('discount_price')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-4">


                                            </div>

                                        </div> {{-- end 7th Row --}}



                                        {{-- 8th Row --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Short Description Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_ar" id="textarea" class="form-control" required placeholder="Textarea text" required="">
                                                      {{ $product->short_descp_ar }}
                                                </textarea>
                                                        @error('short_descp_ar')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Short Description English <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_en" id="textarea" class="form-control" required="" required placeholder="Textarea text">
                                                        {{ $product->short_descp_en }}
                                                </textarea>
                                                        @error('short_descp_en')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Short Description Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp_hin" required="" id="textarea" class="form-control" required placeholder="Textarea text">
                                                        {!! $product->short_descp_hin !!}
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
                                                        <textarea id="editor1" name="long_descp_en" rows="10" cols="80" required="">
                                                        {!! $product->long_descp_en !!}
                                                  </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Long Description Hindi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="long_descp_hin" rows="10" cols="80" required="">
                                                        {!! $product->long_descp_hin !!}
                                                  </textarea>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Long Description Arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor3" name="long_descp_ar" rows="10" cols="80" required="">
                                                        {!! $product->long_descp_ar !!}
                                                  </textarea>
                                                    </div>
                                                </div>


                                            </div>

                                        </div> {{-- end 9th Row --}}



                                        {{-- 10th Row --}}
                                        <div class="row">
                                            <div class="col-md-4">

                                                {{-- <div class="form-group">
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
                                                </div> --}}


                                            </div>

                                            <div class="col-md-4">

                                                {{-- <div class="form-group">
                                                    <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thambnail" class="form-control"
                                                            onChange="mainThumbUrl(this)" required="">
                                                        @error('product_thambnail')
                                                            <span class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                        <img src="" id="mainThumb" alt="">
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
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1"
                                                        {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured" value="1"
                                                        {{ $product->featured == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1"
                                                        {{ $product->special_offer == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Special offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals" value="1"
                                                        {{ $product->special_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
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


        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                        </div>


                        <form method="post" action="{{ route('update-product-image') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">

                                @foreach ($multi_img as $img)
                                    <div class="col-md-3">

                                        <div class="card">
                                            {{-- <img class="card-img-top" src="{{ asset($img->photo_name) }}"
                                                style="width:280px; height:130px"> --}}


                                            @if (!empty($img->photo_name))
                                                <img class="card-img-top" src="{{ asset($img->photo_name) }}"
                                                    style="width:280px; height:130px">
                                            @else
                                                <img class="card-img-top" src="{{ asset('upload/no_image.jpg') }}"
                                                    style="width:280px; height:130px" alt="User Avatar">
                                            @endif


                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="" class="btn btn-sm btn-danger" id="delete"
                                                        title="Delete Data"><i class="fa fa-trash"></i> </a>
                                                </h5>
                                            </div>
                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span
                                                        class="tx-danger">*</span></label>
                                                <input type="file" name="multi_img[{{ $img->id }}]">
                                            </div>

                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br><br>

                        </form>



                    </div>
                </div>

            </div>

        </section>


        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
                        </div>


                        <form method="post" action="{{ route('update-product-thambnail', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">


                                <div class="col-md-3">

                                    <div class="card">
                                        {{-- <img class="card-img-top" src="{{ asset($img->photo_name) }}"
                                                style="width:280px; height:130px"> --}}


                                        @if (!empty($product->product_thambnail))
                                            <img class="card-img-top" src="{{ asset($product->product_thambnail) }}"
                                                style="width:280px; height:130px">
                                        @else
                                            <img class="card-img-top" src="{{ asset('upload/no_image.jpg') }}"
                                                style="width:280px; height:130px" alt="User Avatar">
                                        @endif


                                        <div class="card-body">

                                        </div>
                                        <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image <span
                                                    class="tx-danger">*</span></label>
                                            <input type="file" name="product_thambnail" onChange="mainThumbUrl(this)">
                                            <img src="" id="mainThumb" alt="">
                                        </div>

                                        </p>
                                    </div>
                                </div>


                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br><br>

                        </form>



                    </div>
                </div>

            </div>

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

    {{-- script for image preview --}}

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

@endsection
