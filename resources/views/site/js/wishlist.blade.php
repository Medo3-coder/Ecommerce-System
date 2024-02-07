 <!-- /// Start Add Wishlist Page //// -->
 <script type="text/javascript">
     function addToWishList(product_id) {
         $.ajax({
             method: 'POST',
             url: "{{ route('add.wishlist', ['product_id' => ':id']) }}".replace(':id', product_id),
             dataType: 'json',

             success: function(data) {
                 alert('Added to wishlist');

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
             url: "{{ route('wishlist-product') }}",
             dataType: 'json',
             success: function(response) {

                 // console.log(response);

                 var rows = "";

                 $.each(response, function(key, value) {
                     var discountAmount = value.product.selling_price - value.product.discount_price;
                     rows +=
                         `<tr>
        <td class="col-md-2"><img src="${value.product.product_thambnail}" alt="imga"></td>
        <td class="col-md-7">
            <div class="product-name"><a href="#">${value.product.name.{{ lang() }}}</a></div>

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
             url: "{{ route('wishlist-remove', ['id' => ':id']) }}".replace(':id', id),
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

 <!-- /// End Load Wishlist Data -->
