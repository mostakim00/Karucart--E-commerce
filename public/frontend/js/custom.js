// Get Single Product Id
jQuery(document).on('click','#product_id',function(){
    var product_id = jQuery(this).val();
    
    $.ajax({
        type: "GET",
        url: "addtocart/"+product_id,
        dataType: "json",
        success: function (response) {
            if (response.warning) {
                toastr.warning(response.warning);
            }
            if (response.message) {
                toastr.success(response.message);
            }
            $('.cart_counter').text(response.cart_count);
            $('#side_cart_total').text(response.cart_total);
            $('#cart_item').html('');
            if (!response.cart_count == 0) {
                $.each(response.carts, function (index, value) { 
                    $('#cart_item').append(`
                    <li>
                        <div class="item_image">
                            <img src="`+ 'backend/productImage/' + value.options.image +`" alt="product">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">`+ value.name +`</h4>
                            <span class="item_price">$`+ value.price +`</span>
                        </div>
                        <button id="cartRemove" value="`+ value.rowId +`" type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>`);
                });
            }else{
                $('#cart_item').append(`
                <li>
                    <h4>Cart Is Empty</h4>
                </li>`);
            }
        }
    });
});

// Remove Single Ajax Product Add To Cart
jQuery(document).on('click','#cartRemove',function(){
    var product_id = jQuery(this).val();
    $.ajax({
        type: "GET",
        url: "/cart/remove/"+product_id,
        dataType: "json",
        success: function (response) {
            toastr.success(response.message);
            $('.cart_counter').text(response.cart_count);
            $('#side_cart_total').text(response.cart_total);
            $('#cart_item').html('');
            if (!response.cart_count == 0) {
                $.each(response.carts, function (index, value) { 
                    $('#cart_item').append(`
                    <li>
                        <div class="item_image">
                            <img src="`+ 'backend/productImage/' + value.options.image +`" alt="product">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">`+ value.name +`</h4>
                            <span class="item_price">$`+ value.price +`</span>
                        </div>
                        <button id="cartRemove" value="`+ value.rowId +`" type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>`);
                });
            }else{
                $('#cart_item').append(`
                <li>
                    <h4>Cart Is Empty</h4>
                </li>`);
            }
        }
    });
});

// Cart Product Quantity Increment
$(".input_number_increment").click(function() {
    var button = $(this).val();
    var increment = $('#quantity'+button).val();
    increment++;
    $('#quantity'+button).val(increment);
});

// Cart Product Quantity Decriment
$(".input_number_decrement").click(function() {
    var button = $(this).val();
    var decrement = $('#quantity'+button).val();
    if (decrement <= -1 || decrement <= 1) {
        $('#quantity'+button).val();
    }else{
        decrement--;
    }
    $('#quantity'+button).val(decrement);
});

// Cart Product Delete
jQuery(document).on('click','#cartProductRemove',function(){
    var rowId = jQuery(this).val();

    $.ajax({
        type: "GET",
        url: "/cart/product/remove/"+rowId,
        dataType: "json",
        success: function (response) {
            toastr.success(response.message);
            setTimeout(function() {
                window.location.reload();
            },1000);
        }
    });
});

// Cart Product Update
// jQuery(document).on('click','#cartUpdate',function(){
//     $('#QtyButton').submit(function(e){
//         e.currentTarget.submit();
//     });
// });