jQuery(document).ready(function () {

    // frontend message show
    showdata();
    function showdata() {
        var product_id = jQuery('#product_id').val();
        var user_id = jQuery('#user_id').val();
        var vendor_id = jQuery('#vendor_id').val();
        $.ajax({
            url: '/vendorMessage/show/user/'+product_id,
            method: 'GET',
            dataType: 'json',
            success: function (res) {

                jQuery('.user').html('');

                var user_name = res.user_name;

                $.each(res.data, function (key, item) {
                    // showvendordata();
                    // showdata();
                    if (item.status == 1) {
                        jQuery('.user').append('<div class="d-flex justify-content-end mb-4">\
                                <div class="msg_cotainer_send">'+ item.message + '</div>\
                                <div class="img_cont_msg">\
                                    <img src="http://127.0.0.1:8000/VendorMessage/img/User.png" class="rounded-circle user_img_msg">\
                                </div></div>');
                    }
                    else if (item.status == 2) {
                        jQuery('.user').append('<div class="d-flex justify-content-start mb-4">\
                            <div class="img_cont_msg mr-2">\
                                    <img src="http://127.0.0.1:8000/VendorMessage/img/Vendor.png" class="rounded-circle user_img_msg">\
                                </div>\
                                <div class="msg_cotainer_send" style="background:#82ccdd;">'+ item.message + '</div>\
                                </div>');
                    }
                });
            }
        });
    }


    // frontend store message 
    jQuery('.sendMessage').click(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
       });

        var product_id = jQuery('#product_id').val();
        var user_id = jQuery('#user_id').val();
        var vendor_id = jQuery('#vendor_id').val();
        var message = jQuery('#message').val();
        var status = jQuery('#status').val();

        $.ajax({
            url: 'vendorMessage/store/',
            method: 'POST',
            dataType: 'json',
            data: {
                'product_id':product_id,
                'user_id':user_id,
                'vendor_id':vendor_id,
                'message':message,
                'status':status,
            },
            success: function (res) {
                if (res.status == "failed") {
                   var messageError = jQuery('.messageError').text(res.errors.message);
               }
                else {
                    showdata();
                    showvendordata();
                   jQuery("#message").val('');
               }
            }
        });
    });

    
    // click on li and show the users message 
    jQuery(document).on('click','.active', function() {

        var id = $(this).val();
        
        var username = jQuery(this).find(".username").text();
        $.ajax({
            url: '/vendorMessage/show/userMessages/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (result) {
                jQuery('.msg_head').html('');
                jQuery('.msg_head').append('<div class="d-flex bd-highlight">\
                    <div class="img_cont">\
                        <img src="http://127.0.0.1:8000/VendorMessage/img/User.png" class="rounded-circle user_img">\
                        <span class="online_icon"></span>\
                    </div>\
                    <div class="user_info">\
                        <span>Chat with '+username+'</span>\
                        <p></p>\
                    </div>\
                </div>\
                ');
                
                jQuery('.backuser').html('');
                jQuery('.backvendor').html('');
                jQuery('.msg_footer').html('');
                
                $.each(result.usersMessage, function (key, item) {

                    if (item.status == 2) {
                        jQuery('.backuser').append('<div class="d-flex justify-content-end mb-4">\
                                <div class="msg_cotainer mr-2" style="background:#78E08F;">\
                                    '+ item.message + '\
                                </div>\
                            <div class="img_cont_msg">\
                                    <img src="http://127.0.0.1:8000/VendorMessage/img/Vendor.png" class="rounded-circle user_img_msg">\
                                </div>\
                            </div>');
                    } 
                    else if (item.status == 1) {
                        jQuery('.backuser').append('<div class="d-flex justify-content-start mb-4">\
                            <div class="img_cont_msg">\
                                <img src="http://127.0.0.1:8000/VendorMessage/img/User.png" class="rounded-circle user_img_msg">\
                            </div>\
                            <div class="msg_cotainer">\
                                '+ item.message + '\
                            </div>\
                        </div>');
                    }

                    jQuery('.user_id').html('<input id="user_id" type="hidden" name="user_id" placeholder="User Id" value="'+item.user_id+'" />');
                    jQuery('.product_id').html('<input id="product_id" type="hidden" name="product_id" placeholder="User Id" value="'+item.product_id+'" />');
                    jQuery('.vendor_id').html('<input id="vendor_id" type="hidden" name="vendor_id" placeholder="User Id" value="' + item.vendor_id + '" />');
                });  
                
                 jQuery('.msg_footer').append('<div class="input-group">\
                        <div class="input-group-append">\
                            <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>\
                        </div>\
                        <textarea id="message" class="form-control type_msg" placeholder="Type your message..."></textarea>\
                        <div class="input-group-append">\
                            <span class="input-group-text send_btn back_snd_btn"><i class="fas fa-location-arrow"></i></span>\
                        </div>\
                    </div>');
            }
        });
    });


    // show vendor data in backend 
    showvendordata();
    function showvendordata() {
        var user_id = jQuery('#user_id').val();
        // console.log(user_id);
        $.ajax({
            url: '/vendorMessage/show/vendormessage/'+user_id,
            method: 'GET',
            dataType: 'json',
            success: function (result) {
                jQuery('.backuser').html('');
                $.each(result.data, function (key, item) {
                    // console.log(item);
                    // showvendordata();
                    // showdata();
                    if (item.status == 2) {
                        jQuery('.backuser').append('<div class="d-flex justify-content-end mb-4">\
                                <div class="msg_cotainer mr-2" style="background:#78E08F;">\
                                    '+ item.message + '\
                                </div>\
                            <div class="img_cont_msg">\
                                    <img src="http://127.0.0.1:8000/VendorMessage/img/Vendor.png" class="rounded-circle user_img_msg">\
                                </div>\
                            </div>');
                    } 
                    if (item.status == 1) {
                        jQuery('.backuser').append('<div class="d-flex justify-content-start mb-4">\
                            <div class="img_cont_msg">\
                                <img src="http://127.0.0.1:8000/VendorMessage/img/User.png" class="rounded-circle user_img_msg">\
                            </div>\
                            <div class="msg_cotainer">\
                                '+ item.message + '\
                            </div>\
                        </div>');
                    } 
                });
            }
        });
    }

    // backend store vendor message 
    jQuery(document).on('click', '.back_snd_btn', function (e) {
        e.preventDefault();
        
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        var user_id = jQuery('#user_id').val();
        var product_id = jQuery('#product_id').val();
        var vendor_id = jQuery('#vendor_id').val();
        var message = jQuery('#message').val();
        var status = jQuery('.status').val();

        // alert(user_id);
        $.ajax({
            url: '/vendorMessage/store/',
            method:'POST',
            dataType:'json',
            data:{
                'user_id':user_id,
                'product_id':product_id,
                'vendor_id':vendor_id,
                'message':message,
                'status':status,
            },
            success:function(result){
                if (result.status == "failed") {
                    var messageError = jQuery('.messageError').text(result.errors.message);
                }
                else {
                    showvendordata();
                    showdata();
                    jQuery("#message").val('');
                }
            }
        });
    });

});