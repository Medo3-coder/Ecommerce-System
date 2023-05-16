<script type="text/javascript">
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault()
            that = this;
            var link = $(this).attr('href');
            Swal.fire({
                title: "{{ __('هل تريد الاستمرار ؟') }}",
                text: "{{ __('هل انت متأكد انك تريد استكمال عملية الحذف') }}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('admin.confirm') }}',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonText: '{{ __('admin.cancel') }}',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: link,
                        success: function(response, textStatus, xhr) {
                            $(that).parent().parent().remove();
                            Swal.fire({
                                position: 'top-start',
                                type: 'success',
                                title: '{{ __('admin.the_selected_has_been_successfully_deleted') }}',
                                showConfirmButton: false,
                                timer: 1500,
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,
                            })
                        }
                    });
                }
            });
        });
    });
</script>
