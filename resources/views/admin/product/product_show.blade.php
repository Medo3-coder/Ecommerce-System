@extends('admin.layouts.master')

@section('title', 'Product manage')

@section('admin')

    {{-- @php

    dd($product->subCategory->sub_category_name_en);
@endphp --}}

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title"> <strong>Product Details</strong></h4>
                    </div>
                    <div class="row row-sm">
                        <div class="col-md-6">
                            <div class="card-body">
                                <img class="card-img-top" src="{{ asset($product->product_thambnail) }}"
                                    style="width:280px; height:130px">
                                <div class="card-body">

                                    <h5 class="card-title"> Name : {{ $product->product_name_en }}</h5>
                                    <p class="card-text"> Description : {!! $product->long_descp_en !!}</p>
                                    <label for="exampleInputEmail1"> Price : ${{ $product->selling_price }} </label> <br>
                                    <label for="exampleInputEmail1">Discount Price : ${{ $product->discount_price }}
                                    </label>


                                </div>
                            </div>
                        </div>




                        <div class="col-md-6">
                            <div class="card-body">

                                <div class="card-body">


                                    @if ($product->status == 1)
                                        Status : <span class="badge badge-success">Active</span>
                                    @else
                                        Status : <span class="badge badge-danger">Inactive</span>
                                    @endif


                                    <p class="card-text"> product Quantity : {{ $product->product_qty }}</p>
                                    <h5 class="card-title"> Product Code : {{ $product->product_code }} </h5>
                                    <p class="card-text"> Category : {{ $product->category->category_name_en }}</p>
                                    <p class="card-text"> SubCategory :
                                        {{ $product->subCategory->sub_category_name_en }}</p>


                                </div>

                            </div>
                        </div>





                    </div>







                </div>
            </div>

        </div>

    </section>



@endsection
