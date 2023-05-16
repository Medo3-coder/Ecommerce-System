<script>
    $(document).ready(function(){
        $(document).on('submit','.store',function(e){
            e.preventDefault();
            var url = $(this).attr('action')
            $.ajax({
                url: url,
                method: 'post',
                data: new FormData($(this)[0]),
                dataType:'json',
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $(".submit_button").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disable',true)
                },
                success: function(response){
                    $(".text-danger").remove()
                    $('.store input').removeClass('border-danger')
                    $(".submit_button").html("{{__('admin.update')}}").attr('disable',false)
                    Swal.fire({
                                position: 'top-start',
                                type: 'success',
                                title: '{{__('admin.update_successfullay')}}',
                                showConfirmButton: false,
                                timer: 1500,
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,
                            })
                    setTimeout(function(){
                        window.location.replace(response.url)
                    }, 1000);
                },
                error: function (xhr) {
                    $(".submit_button").html("{{__('admin.update')}}").attr('disable',false)
                    $(".text-danger").remove()
                    $('.store input').removeClass('border-danger')

                    $.each(xhr.responseJSON.errors, function(key,value) {
                        if (key.indexOf(".") >= 0) {
                            var split = key.split('.')
                            key = split[0] + '\\[' + split[1] + '\\]'
                        }

                        $('.store .error.' + key ).after(`<span class="mt-5 text-danger">${value}</span>`);

                        // normal inputs 
                        $('.store input[name^=' + key + ']').addClass(
                        'border-danger')
                        $('.store input[name^=' + key + ']').after(
                        `<span class="mt-5 text-danger">${value}</span>`);
                        // for textarea
                        $('.store textarea[name^=' + key + ']').addClass(
                        'border-danger')
                        $('.store textarea[name^=' + key + ']').after(
                        `<span class="mt-5 text-danger">${value}</span>`);
                        // for select input
                        $('.store select[name^=' + key + ']').addClass(
                        'border-danger')
                        $('.store select[name^=' + key + ']').after(
                        `<span class="mt-5 text-danger">${value}</span>`);
                    });
                },
            });

        });
    });
</script>