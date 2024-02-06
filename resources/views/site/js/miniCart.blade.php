<script type="text/javascript">
    function miniCart() {
        $.ajax({
            url: "{{ route('mini.cart.store') }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                var miniCart = "";
                // console.log(response.carts);
                // $('span[id="cartSubTotal"]').empty();
                // $('#cartQty').empty();
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                // $('span[id="cartQty"]').text(response.cartQty);
                $('#cartQty').text(response.cartQty);
                $.each(response.carts, function(key, value) {


                    miniCart += `<div class="cart-item product-summary">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="image"> <a href="detail.html"><img
                                    src="${value.options.image}" alt=""></a> </div>
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
