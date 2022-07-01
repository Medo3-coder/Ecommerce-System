<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title> @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    @stack('css')
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->



    @include('frontend.layouts.header')
    <!-- ============================================== HEADER : END ============================================== -->

    @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.layouts.footer')

    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->

        <!-- /.header-top -->
        <!-- ============================================== TOP MENU : END ============================================== -->


        <!-- ============================================================= FOOTER : END============================================================= -->

        <!-- For demo purposes – can be removed on production -->

        <!-- For demo purposes – can be removed on production : End -->

        <!-- JavaScripts placed at the end of the document so the pages load faster -->
        <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        {{-- //sweet alert --}}

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"
                integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script>
            $(document).ready(function() {
                $('.image').lazyload();
            })
        </script>

















        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><strong><span
                                    id="product-name"></span></strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            id="closeModals">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>





                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-4">

                                <div class="card" style="width: 18rem;">
                                    <img src="" class="card-img-top" alt="..." style="width:200px; height:200;"
                                        id="product-image">
                                </div>

                            </div><!-- /.col-md-4 -->

                            <div class="col-md-4">


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Price :
                                        <strong class="text-danger">$<span id="product-price"></span>

                                        </strong>
                                        <del id="product-discount"></del>
                                    </li>
                                    <li class="list-group-item">Code : <strong id="product-code"> </strong></li>
                                    <li class="list-group-item">Category : <strong id="product-category"> </strong></li>
                                    <li class="list-group-item">Brand : <strong id="product-brand"> </strong></li>
                                    <li class="list-group-item">Stock :
                                        <span class="badge badge-pill badge-success" id="available"
                                            style="background: green; color: white;"></span>
                                        <span class="badge badge-pill badge-danger" id="stockout"
                                            style="background: red; color: white;"></span>



                                    </li>
                                </ul>

                            </div><!-- /.col-md-4 -->


                            <div class="col-md-4">

                                <div class="form-group" id="colorArea">
                                    <label for="color">Choose Color</label>
                                    <select class="form-control" id="color" name="color">


                                    </select>
                                </div>




                                <div class="form-group" id="sizeArea">
                                    <label for="size">Choose Size</label>
                                    <select class="form-control" id="size" name="size">


                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="Qty">Quantity</label>
                                    <input type="number" class="form-control" id="Qty" value="1" min="1">

                                </div>

                                <input type="hidden" id="product_id">
                                <button type="submit" id="addToMiniCart" class="btn btn-primary mb-2" onclick="addToCart()">Add to
                                    Cart</button>



                            </div> <!-- /.col-md-4 -->

                        </div> <!-- /.row -->



                    </div> <!-- /end modal-body -->







                </div>
            </div>
        </div><!-- End Add to Cart Product Modal -->


        {{-- <script>
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var product_id = $(this).attr('product-id');
            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {product_id: product_id, _token: '{{ csrf_token() }}'},
                success: function(data){
                    toastr.success('Product added to cart');
                }
            });
        });
    });
  </script> --}}



        <script class="">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //product view

            function productView(id) {
                //    alert(id);
                //    console.log(id);


                $.ajax({
                    url: '/product/view/modal/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        // console.log(data.product.product_name_en);
                        $('#product-name').text(data.product.product_name_en);
                        $('#product-price').text(data.product.selling_price);
                        $('#product-code').text(data.product.product_code);
                        $('#product-category').text(data.product.category.category_name_en);
                        $('#product-brand').text(data.product.brand.brand_name_en);
                        $('#product-image').attr('src', '/' + data.product.product_thambnail);
                        $('#product_id').val(id); // passing prduct id to hidden input on cart

                        $('#Qty').val(1);



                        //product price
                        if (data.product.discount_price == null) {
                            $('#product-price').empty();
                            $('#product-discount').empty();
                            $('#product-price').text(data.product.selling_price);

                        } else {
                            $('#product-price').text(data.discountAmount);
                            $('#product-discount').text(data.product.selling_price);

                        }


                        //product quantity option
                        if (data.product.product_qty > 0) {
                            $('#available').empty();
                            $('#stockout').empty();
                            $('#available').text('available');
                            $('#addToMiniCart').show();

                        } else {
                            $('#available').empty();
                            $('#stockout').empty();
                            $('#stockout').text('stockOut');
                            $('#addToMiniCart').hide();


                        }




                        //color
                        // console.log(data.color.product_color_en);
                        $('select[name="color"]').empty();
                        $.each(data.color.product_color_en, function(key, value) {
                            $('select[name="color"]').append('<option value =" ' + value + ' ">' + value +
                                '</option>')
                        });

                        //to hide div color if no size option for product
                        if (data.color.product_color_en == "") {
                            $('#colorArea').hide();
                        } else {
                            $('#colorArea').show();
                        }




                        //size
                        $('select[name="size"]').empty();
                        $.each(data.size.product_size_en, function(key, value) {
                            $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                                '</option>')
                        });

                        //to hide div size if no size option for product
                        if (data.size.product_size_en == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }

                    }
                })
            }
        </script>


        {{-- ./Add to cart Start --}}
        <script>
            function addToCart() {
                var id = $('#product_id').val();
                var product_name = $('#product-name').text();
                var color = $('#color option:selected').text();
                var size = $('#size option:selected').text();
                var quantity = $('#Qty').val();
                // console.log(id);

                $.ajax({
                    url: "/cart/data/store/" + id,
                    type: 'POST',
                    dataType: 'json',
                    data: {

                        product_name: product_name,
                        color: color,
                        size: size,
                        quantity: quantity
                    },
                    success: function(data) {
                        miniCart();
                        $('#closeModals').click();
                        // console.log(data)
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',

                            showConfirmButton: false,
                            timer: 3000
                        });

                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                icon: 'success',
                                title: data.success,
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.error,
                            });
                        }
                    }
                });
            }
        </script>

        {{-- Add to cart end --}}


        <script type="text/javascript">
            function miniCart() {
                $.ajax({
                    url: '/product/mini/cart',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        var miniCart = "";
                        // console.log(response.carts);
                        // $('span[id="cartSubTotal"]').empty();
                        // $('#cartQty').empty();
                        $('span[id="cartSubTotal"]').text(response.cartTotal);
                        // $('span[id="cartQty"]').text(response.cartQty);
                        $('#cartQty').text(response.cartQty);
                        $.each(response.carts, function(key, value) {

                            miniCart +=
                                `<div class="cart-item product-summary">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="image"> <a href="detail.html"><img
                                            src="/${value.options.image}" alt=""></a> </div>
                            </div>
                            <div class="col-xs-7">
                                <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                <div class="price">${value.price} * ${value.qty}</div>
                            </div>
                            <div class="col-xs-1 action">
                                 <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.cart-item -->
                    <div class="clearfix"></div>
                    <hr>`;

                        });

                        $('#miniCart').html(miniCart);
                    }

                })
            }
            miniCart();

            /// mini cart remove Start
            function miniCartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/minicart/product-remove/' + rowId,
                    dataType: 'json',
                    success: function(data) {
                        miniCart();
                        // Start Message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }

                        // End Message
                    }
                });
            }
            //  end mini cart remove
        </script>



        <!-- /// Start Add Wishlist Page //// -->
        <script type="text/javascript">
            function addToWishList(product_id) {
                $.ajax({
                    method: 'POST',
                    url: '/add-to-wishlist/' + product_id,
                    dataType: 'json',

                    success: function(data) {
                        // alert('Added to wishlist');

                        // Start Message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                        // End Message
                    }

                });
            }
        </script>
        <!-- /// End Add Wishlist Page //// -->


        <!-- /// Load Wishlist Data -->
        <script type="text/javascript">
            function wishlist() {
                $.ajax({
                    type: 'GET',
                    url: '/user/get-wishlist-product',
                    dataType: 'json',
                    success: function(response) {

                        // console.log(response);

                        var rows = "";

                        $.each(response, function(key, value) {
                            var discountAmount = value.product.selling_price - value.product.discount_price;
                            rows +=
                                `<tr>
                <td class="col-md-2"><img src="/${value.product.product_thambnail}" alt="imga"></td>
                <td class="col-md-7">
                    <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>

                    <div class="price">

                        ${value.product.discount_price == null
                          ? `${value.product.selling_price}`
                          : `${discountAmount}  <span>$ ${value.product.selling_price}</span>`
                        }

                    </div>
                </td>
                <td class="col-md-2">
                    <button class="btn btn-primary icon" data-toggle="modal" type="button"
                    data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)">
                    Add To Cart </button>

                </td>
                <td class="col-md-1 close-btn">
                    <button type="submit" id="${value.id}" class="" onclick="wishListRemove(this.id)"><i class="fa fa-times"></i></button>
                </td>
            </tr>`;


                        });

                        $('#wishlist').html(rows);
                    }
                });
            }

            wishlist();

            ///// Start Wishlist Remove ////

            function wishListRemove(id) {
                $.ajax({
                    type: 'GET',
                    url: '/user/wishlist-remove/' + id,
                    dataType: 'json',
                    success: function(data) {
                        wishlist();
                        // Start Message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                        // End Message
                    }

                });
            }


            // End Wishlist remove
        </script>

        <!-- /// End Load Wisch list Data -->


        <!-- /// Load My Cart /// -->

        <script type="text/javascript">
            function cart() {
                $.ajax({
                    type: 'GET',
                    url: '/user/get-cart-product',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        var rows = "";

                        $.each(response.carts, function(key, value) {
                            rows +=
                                `<tr>
                <td class="col-md-2"><img src="/${value.options.image}" alt="imga"
                    style="width:60px ; height:60"></td>
                <td class="col-md-2">
                    <div class="product-name"><a href="#">${value.name}</a></div>

                    <div class="price">

                        ${value.price}

                    </div>

                    <td class="col-md-2">
                        <strong> ${value.options.color} </strong>
                     </td>

                     <td class="col-md-2">
                        ${value.options.size == null
                          ? `<span>.....</span>`
                          :`<strong> ${value.options.size} </strong>`
                        }

                     </td>


                     <td class="col-md-2">
                        ${value.qty > 1
                            ?  `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" class="" onclick="cartDecrement(this.id)">-</button>`

                            : `<button type="submit" class="btn btn-danger btn-sm" disabled>-</button>`

                            }
                        <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px">
                        <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" class="" onclick="cartIncrement(this.id)">+</button>
                     </td>

                     <td class="col-md-2">
                        <strong>$ ${value.subtotal} </strong>
                     </td>




                </td>
                <td class="col-md-1 close-btn">
                    <button type="submit" id="${value.rowId}" class="" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
                </td>
            </tr>`;
                        });

                        $('#cartPage').html(rows);
                    }
                });
            }

            cart()



            ///// Start cartPage Remove ////

            function cartRemove(id) {
                $.ajax({
                    type: 'DELETE',
                    url: '/user/cart-remove/'+id,
                    dataType: 'json',
                    success: function(data) {
                        cart();
                        miniCart();
                        // Start Message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                        // End Message
                    }

                });
            }


            // End cartPage remove



          // -------- CART INCREMENT --------//

          function cartIncrement(rowId)
            {
                // console.log(rowId);
                $.ajax({
                      type: 'GET',
                        url: '/cart-increment/'+rowId,
                        dataType: 'json',
                        success: function(data){
                            cart();
                            miniCart();
                        }
                });
            }

           // ---------- END CART INCREMENT -----///



           // -------- CART Decrement --------//


          function cartDecrement(rowId)
          {
             $.ajax({
               type:'GET',
               url: '/cart-decrement/'+rowId,
               datatypes: 'json',
                success: function(data){
                  cart();
                  miniCart();
                }
             });
          }



             // --------END CART Decrement --------//
        </script>


        <!-- //End Load My cart / -->


<!-- //////////////// =========== start Coupon Apply Start ================= //// -->

        <script type="text/javascript">
        function applyCounpon()
        {
            let coupon_name = $('#coupon_name').val();
            $.ajax({
                type:'POST',
                dataType: 'json',
                url:"{{ url('/coupon-apply') }}",
                // url:"/coupon-apply",
                data:{coupon_name : coupon_name},
                success : function(data) {
                    couponCalculation();
                    $('#couponField').hide();
                    // Start Message
                    const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }
                        // End Message
                }

            })
        }




        function couponCalculation()
        {
            $.ajax({
                type:'GET',
                url:'/coupon-calculation',
                dataType: 'json',
                success: function(data)
                {
                    if(data.total)
                    {
                        $('#Coupon_Calculated_Field').html(`
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">${data.total}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">${data.total}</span>
                                    </div>
                                </th>
                            </tr>
                        `);
                    }
                    else
                    {
                        $('#Coupon_Calculated_Field').html(`
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">${data.subtotal}</span>
                                    </div>

                                    <div class="cart-sub-total">
                                        Coupon<span class="inner-left-md"> $ ${data.coupon_name}</span>
                                        <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button>
                                    </div>

                                    <div class="cart-sub-total">
                                        Discount Amount<span class="inner-left-md">${data.coupon_discount}</span>
                                    </div>

                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">${data.total_amount}</span>
                                    </div>
                                </th>
                            </tr>
                        `);
                    }

                }
            });
        }

        couponCalculation();  // call couponCalculation function
        </script>

  <!-- //////////////// =========== End Coupon Apply Start ================= //// -->


    <!-- //////////////// =========== start Coupon Remove Start ================= //// -->

    <script type="text/javascript">

        function couponRemove(){
           $.ajax({
               type:'GET',
               url: "{{ url('/coupon-remove') }}",
               dataType: 'json',
               success:function(data){
                   couponCalculation();
                   $('#couponField').show();
                   $('#coupon_name').val('');
                    // Start Message
                   const Toast = Swal.mixin({
                         toast: true,
                         position: 'top-end',

                         showConfirmButton: false,
                         timer: 3000
                       })
                   if ($.isEmptyObject(data.error)) {
                       Toast.fire({
                           type: 'success',
                           icon: 'success',
                           title: data.success
                       })
                   }else{
                       Toast.fire({
                           type: 'error',
                           icon: 'error',
                           title: data.error
                       })
                   }
                   // End Message
               }
           });
        }
   </script>


    <!-- //////////////// =========== start Coupon Remove Start ================= //// -->

</body>



</html>
