<script type="text/javascript">
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault()
            that = this;
            var link = $(this).attr('href');

            Swal.fire({
                icon: 'warning',
                title: 'Are you sure you want to delete this record?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: link,
                        data: {
                            '_method': 'DELETE',
                        },
                        success: function(response, textStatus, xhr) {
                            $(that).parent().parent().remove();

                            Swal.fire({
                                icon: 'success',
                                title: response,
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'Yes'
                            }).then((result) => {

                                // window.location.reload();
                            });
                        }
                    });
                }
            });
        });
    });
</script>
