
    $(document).ready(function () {
        //ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submit').click(function(){
            var email = $('#email').val();
            $.ajax({
                type: "post",
                url: "/newslatter/store",
                data: {
                    'email':email,
                },
                dataType: "json",
                success: function (response) {
                    if(response.status=='faild'){
                        $('.emailerror').text(response.errors.email);
                    }
                    else{
                        toastr.success(response.success,response.message);
                        //alert(response.message)
                        $('.emailerror').text('');
                        $('#email').val('');
                    }
                    
                }
            });
        });
    });

