$(document).ready(function () {
    $('#role_id').change(function () {
        var role_id = $(this).val();
        if (role_id == 'vendor') {
            $('#paymentInfo').removeClass('hidden');
            $('#paymentInfo').addClass('show');
        } else {
            $('#paymentInfo').removeClass('show');
            $('#paymentInfo').addClass('hidden');
        }
    });
   // light box
	 	myTheme.lightbox = function () {
			lightbox.option({
				'resizeDuration': 200,
				'wrapAround': true
			});
		};
		
	// Slider jQuery-ajax
	jQuery(document).on('change','#product_name',function(){
        
        var product_id = jQuery(this).val();
        $.ajax({
            url: 'productDetailesShow/'+product_id,
            type : 'GET',
            dataType : 'json',
            success: function(response){
                jQuery('#product_price').val(response.data.product_price);
                jQuery('#product_disPrice').val(response.data.discount_price);
                jQuery('#product_category').val(response.data.category.category_name);
            }
        });
    });
    
});
