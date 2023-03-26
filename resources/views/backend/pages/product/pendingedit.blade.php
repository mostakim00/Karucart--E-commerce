@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Pending Product | Edit | KaruKart 
@endsection
 <div class="br-pagetitle">
 <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
        <div class="ml-5">
        <h4>@yield('title')</h4>
            <p class="mg-b-0">Hey! There Is PRODUCT Page! Add This Product !</p>
            </div>
            <div class="ml-auto">
                <button class="btn btn-sm btn-primary btn-block mg-b-10"><a href="{{route('admin.dashboard')}}" class="text-white">Dashboad</a></button>
                <button class="btn btn-sm btn-primary active btn-block mg-b-10"><a href="{{route('manage.products')}}" class="text-white">Manage Product</a></button>
            </div>
      </div>

      <div class="br-pagebody">
      <div class="form-layout form-layout-1 bg-white">
        <form action="{{route('product.pending.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mg-b-25">
              <!-- PRODUCT Vendor -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"><b>Vendor ID:</b></label>
                  <input class="form-control" type="text" name="vendor_id" value="{{$product->vendor->name}}" readonly>
                  @error('vendor_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                
                <!-- PRODUCT CODE -->
                <div class="form-group">
                  <label class="form-control-label"><b>Product Code:</b>  </label>
                  <input class="form-control" type="text" name="product_code" value="{{old('product_code',$product->product_code)}}">
                  @error('product_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                
                <!-- Product Name -->
                <div class="form-group">
                  <label class="form-control-label"><b>Product Name:</b>  </label>
                  <input class="form-control" type="text" name="product_name" value="{{old('product_name',$product->product_name)}}" placeholder="Enter Product Name.....">
                  @error('product_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                
                <!-- PRODUCT PRICE -->
                <div class="form-group">
                  <label class="form-control-label"><b>Product Price:</b>  </label>
                  <input class="form-control" type="number" name="product_price" value="{{old('product_price',$product->product_price)}}" placeholder="Enter Product Price.....">
                  @error('product_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                
                <!-- PRODUCT DISCOUNT PRICE -->
                <div class="form-group">
                  <label class="form-control-label"><b>Product Discount Price:</b>  </label>
                  <input class="form-control" type="number" name="discount_price" value="{{old('discount_price',$product->discount_price)}}" placeholder="Enter Product Discount Price.....">
                  @error('discount_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                
                <!-- PRODUCT QUANTITY -->
                <div class="form-group">
                  <label class="form-control-label"><b>Product Quantity:</b>  </label>
                  <input class="form-control" type="number" name="quantity" value="{{old('quantity',$product->quantity)}}" placeholder="Enter Product Quantity.....">
                  @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                
                  <!-- CATEGORY ID -->
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label"><b>Product Category:</b> </label>
                  <select name="cat_id" id="cat_id" class="form-control">
                    <option value="">=======Product Category=======</option>
                      @foreach($category as $categor)
                        <option value="{{$categor->id}}" @if($categor->id == $product->cat_id ) selected @endif>{{$categor->category_name}}</option>
                      @endforeach
                    </select>
                </div>
                @error('cat_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <!-- SUB CATEGORY ID -->
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label"><b>Product SubCategory:</b> </label>
                  <select name="subcat_id" id="subcat_id" class="form-control">
                    @if($subcategory != null)
                       <option value="{{$subcategory->id}}" @if($subcategory->id == $product->subcat_id ) selected @endif>{{$subcategory->sub_name}}</option>
                    @else   
                       <option value="">Select Subcategory</option>
                     @endif  
                      </select>
                </div>
                @error('subcat_id')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
                <!-- Product Thumbnails  -->
                <div class="form-group">
                <label class="form-control-label"><b>Product Thumbnails:</b>  </label>
                 <div class="custom-file">
                    <input type="file" name="thumbnails" id="inputImage" class="custom-file-input">
                    <label class="custom-file-label bg-secondary tx-white">----- Product Thumbnail ------</label>
                  </div>
                  @error('thumbnails')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="text-center mt-3">
                     <img height="100" width="100" id="showImage" src="{{asset('backend/productImage/'.$product->thumbnails)}}" class="img-fluid" alt="Product Image">
                  </div> 
                </div>
                <!-- Product Short Description: -->
                <div class="form-group">
                  <label class="form-control-label"><b>Product Short Description:</b>  </label>
                  <textarea rows="3" cols="3" class="form-control" name="short_desc" placeholder="Product Short Description.....">{{old('short_desc',$product->short_desc)}}</textarea>
                  @error('short_desc')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              
                <!-- Product GALLERY  -->
              <div class="col-lg-6">
                <!--<div class="form-group">-->
                <!--<label class="form-control-label"><b>Product Gallery:</b>  </label>-->
                <!--<div class="custom-file">-->
                <!--    <input type="file" multiple name="product_gallery[]" id="file" class="custom-file-input">-->
                <!--    <label class="custom-file-label bg-secondary tx-white">----- Product Gallery ------</label>-->
                <!--  </div>-->
                <!--  <div class="text-center mt-3">-->
                <!--     <img height="100" width="100" src="{{asset('backend/assets/img/img11.jpg')}}" class="img-fluid" alt="">-->
                <!--  </div> -->
                <!--</div>-->
                
                <div class="form-group">
                    <label for="">Gallery Images</label>
                    <div id="image_preview" style="width:100%;">
                        @foreach ($galleryimages as $galleryimage)
                            <div class="img-div" id="img-div">
                                <img class="image" height="150"
                                    src="{{ asset('backend/productImage/product_galleries/' . $galleryimage->images) }}"
                                    alt="">
                                <div class="middle">
                                    <a href="{{ asset('backend/productImage/product_galleries/' . $galleryimage->images) }}"
                                        class='btn btn-primary text-white' data-lightbox="roadtrip"><i class='fa fa-eye'></i></a>
                                    <a href="{{ route('singleimage.delete', $galleryimage->id) }}"
                                        class='btn btn-danger text-white'><i class='fa fa-trash'></i></a>
                                        <!--<button value="{{$galleryimage->id}}"-->
                                        <!--            class='btn btn-danger text-white btndelete'><i class='fa fa-trash'></i></button>-->
                                </div>
                            </div>
                        @endforeach
                        <input type="file" name="images[]" class="form-control" id="images" multiple>
                    </div>
                </div>
              </div>
            </div>
              
              <!-- Product LONG Description: -->
              <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label"><b>Product Long Description:</b>  </label>
                      <textarea rows="3" col="3" id="summernote" class="form-control" name="long_desc">{{old('long_desc',$product->long_desc)}}</textarea>
                      @error('long_desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                </div>
              </div>
              
              
                <!-- FOOTER BUTTON -->
                <div class="row">
                  <div class="col-lg-2">
                    <div class="form-group mg-t-40-force">
                      <div class="form-layout-footer">
                          <button type="submit" class="btn btn-sm btn-primary active btn-block mg-b-10"><b>UPDATE PRODUCT</b></button>
                        </div><!-- form-layout-footer -->
                    </div>
                  </div>
                </div>
            </form>
          </div>
      </div><!-- br-pagebody -->

      <script>
        jQuery(document).ready(function(){
            jQuery('#inputImage').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    jQuery('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
            
            jQuery('.btndelete').click(function(){

                var id = jQuery(this).val();
                
                $.ajax({
                    url:'/product/delete/singleproduct/imageajax/'+id,
                    type:'GET',
                    dataType:'JSON',
                    success:function(result){
                        console.log(result.msg);
                    }
                });
                return false;
            });
        });
      </script>
      <script>
         jQuery(document).ready(function(){
            jQuery(document).on('change','#cat_id',function(){
               var cat_id = jQuery(this).val();
               $.ajax({
                  url:'/admin/product/searchcategoryforedit/'+cat_id,
                  dataType:'JSON',
                  type:'GET',
                  success:function(data){
                      var html = '<option value="">Select Subcategory </option>';
                      $.each(data.subcategoryggggggd,function(key,val){
                        html += '<option value="'+val.id+'">'+val.sub_name+'</option>';
                      });
                      jQuery('#subcat_id').html(html);
                  }
               });
            });
         });
      </script>
@endsection