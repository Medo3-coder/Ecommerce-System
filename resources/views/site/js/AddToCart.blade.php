<script>
function addToCart() {
    var id = $('#product_id').val();
    var product_name = $('#product-name').text();
    var color = $('#color option:selected').text();
    var size = $('#size option:selected').text();
    var quantity = $('#Qty').val();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{ route('cart.store', ['id' => ':id']) }}".replace(':id', id),
        data: {

            name: product_name,
            color: color,
            size: size,
            qty: quantity
        },
        success: function(data) {
            // console.log(data.);
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
