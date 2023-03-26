jQuery('#inputImage').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
        jQuery('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});
jQuery(document).on('change','#cat_id',function(){
   var cat_id = jQuery(this).val();
   $.ajax({
      url:'searchcategory',
      dataType:'JSON',
      type:'GET',
      data:{
        'cat_id':cat_id
      },
      success:function(data){
          var html = '<option value="" disabled>Select Subcategory </option>';
          $.each(data.subcategorygggg,function(key,subcate){
            html += '<option value="'+subcate.id+'">'+subcate.sub_name+'</option>';
          });
          jQuery('#subcat_id').html(html);
      }
   });
});
