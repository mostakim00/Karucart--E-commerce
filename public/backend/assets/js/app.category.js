
$(document).ready(function () {
    //ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*=======================category add===================== */
    $(document).on('submit','#categoryData',function(e){
        e.preventDefault();
        let categoryData= new FormData($('#categoryData')[0]);
        $.ajax({
            type: "post",
            url: "/admin/category/store",
            data: categoryData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                 //vallidation message
                    if(response.status=='faild'){
                        $('.catNameError').text(response.errors.category_name);
                        $('.catDesError').text(response.errors.category_des);
                        $('.catImgError').text(response.errors.category_img);
                   }
                   else{
                        
                        $("#addcategory").modal('hide');
                        $('.table').load(location.href+' .table');
                        toastr.success(response.success,response.message);
                        $("#addcategory").find('input').val('');
                        $("#addcategory").find('textarea').val('');
                        $('.catNameError').text('');
                        $('.catDesError').text('');
                        $('.catImgError').text('');
                       }
                
            }
        });
    
    });

    /*=======================category Delete===================== */
    $(document).on('click', '.catDelete', function(e){
        e.preventDefault();
        var categoryID = $(this).val();
        if(confirm('are you want to Delete this Category')){
            $.ajax({
                type: "get",
                url: "/admin/category/delete/"+categoryID,
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
    /*=======================category show for update===================== */

    $(document).on('click', '.catEdit',function(e){
        e.preventDefault();
        var categoryId= $(this).val();
        $.ajax({
            type: "get",
            url: "/admin/category/edit/"+categoryId,
            dataType: "json",
            success: function (response) {
                if(response.status=="ok"){
                    $('#catid').val(categoryId);
                    $('#eidit_category_name').val(response.data.category_name);
                    $('#eidit_category_des').val(response.data.category_des);
                    $('#eidit_status').val(response.data.status);
                    
                }
            }
        });
    });

    /*=======================category update===================== */
    $(document).on('submit','#editcategoryData',function(e){
        e.preventDefault();
        var categoryId= $('#catid').val();
        let categoryUpdateData = new FormData($('#editcategoryData')[0]);
        $.ajax({
            type: "post",
            url: "/admin/category/update/"+categoryId,
            data:categoryUpdateData,
            dataType: "json",
            contentType:false,
            processData:false,
            success: function (response) {
                 //vallidation message
                 if(response.status=='faild'){
                    $('.catUpdateNameError').text(response.errors.category_update_name);
                    $('.catUpdateNameDesError').text(response.errors.category_update_des);
                    $('.catUpdateNameImgError').text(response.errors.category_update_img);
                }
                //update confirmation
                else{
                        
                    jQuery("#catEditModal").modal('hide');
                    $('.table').load(location.href+' .table');
                    toastr.success(response.success,response.message);
                    jQuery("#catEditModal").find('input').val('');
                    jQuery("#catEditModal").find('textarea').val('');
                    $('.catUpdateNameError').text('');
                    $('.catUpdateNameDesError').text('');
                    $('.catUpdateNameImgError').text('');
                   }
                
            }
        });
    });

    /*=======================category pagination===================== */

    //   $(document).on('click', '.pagination a', function(e){
    //       e.preventDefault();
    //     let page= $(this).attr('href').split('page=')[1];
    //     categoryPagination(page);
    //      function categoryPagination(page){
    //          $.ajax({
    //              type: "get",
    //              url: "/category/pagination?page="+page,
    //              success: function (response) {
    //                  $('.table-data').html(response);
    //              }
    //          });
    //      }
    //  });
 });

