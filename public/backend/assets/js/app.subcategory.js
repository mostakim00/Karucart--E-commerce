jQuery(document).ready(function () {
    //ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*=======================category add===================== */
    $(document).on('submit', '#subCategoryData', function (e) {
        e.preventDefault();
        let subCategoryData = new FormData($('#subCategoryData')[0]);
        $.ajax({
            type: "post",
            url: "/admin/subcategory/store",
            data: subCategoryData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                //vallidation message
                if (response.status == 'faild') {
                    $('.subcatnameerror').text(response.errors.sub_name);
                    $('.subcatimageerror').text(response.errors.sub_image);
                } else {
                    $("#exampleModal").modal('hide');
                    $('.table').load(location.href + ' .table');
                    toastr.success(response.success, response.message);
                    $("#exampleModal").find('input').val('');
                    $('.subcatnameerror').text('');
                    $('.subcatimageerror').text('');
                }

            }
        });

    });

    /*=======================category Delete===================== */
    $(document).on('click', '.subcatDelete', function(e){
        e.preventDefault();
        var subcategoryID = $(this).val();
         if(confirm('are you want to Delete this Category')){
            $.ajax({
                type: "get",
                url: "/admin/subcategory/delete/"+subcategoryID,
                dataType: "json",
                success: function (response) {
                    if(response.status="ok"){
                       $('.table').load(location.href+' .table');
                        toastr.error(response.error,response.message);
                    }

                }
            });
        }
    });

/*=======================subcategory show for update===================== */
    $(document).on('click', '.subcatEdit',function(e){
        e.preventDefault();
        var subcategoryId= $(this).val();
        $.ajax({
            type: "get",
            url: "/admin/subcategory/edit/"+subcategoryId,
            dataType: "json",
            success: function (response) {
                 if(response.status=="ok"){
                     $('#subcatid').val(subcategoryId);
                    $('#editsubName').val(response.data.sub_name);
                     $('#editsubStatus').val(response.data.sub_status);
                 }
            }
        });
    });
});

/*=======================category update===================== */
$(document).on('submit','#editsubCategoryData',function(e){
    e.preventDefault();
    var subcategoryId= $('#subcatid').val();
    let subcategoryUpdateData = new FormData($('#editsubCategoryData')[0]);
    $.ajax({
        type: "post",
        url: "/admin/subcategory/update/"+subcategoryId,
        data:subcategoryUpdateData,
        dataType: "json",
        contentType:false,
        processData:false,
        success: function (response) {
             //vallidation message
             if(response.status=='faild'){
                $('.updatesubcatnameerror').text(response.errors.update_sub_name);
               // $('.catUpdateNameDesError').text(response.errors.category_update_des);
                $('.updatesubcatimageerror').text(response.errors.updatesub_image);
            }
            //update confirmation
            else{

                jQuery("#editSubcategory").modal('hide');
                $('.table').load(location.href+' .table');
                toastr.success(response.success,response.message);
                jQuery("#editSubcategory").find('input').val('');
                jQuery("#editSubcategory").find('textarea').val('');
                $('.updatesubcatnameerror').text('');
               // $('.catUpdateNameDesError').text('');
                $('.updatesubcatimageerror').text('');
               }
        }
    });
});
