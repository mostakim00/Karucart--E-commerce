@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Product | Insert | KaruKart 
@endsection

    <div class="br-pagetitle">
        <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
        <div class="ml-5">
        <h4>@yield('title')</h4>
            <p class="mg-b-0">Hey! There Is PRODUCT Page! Add This Product !</p>
        </div>
        <div class="ml-auto">
            <button class="btn btn-sm btn-primary btn-block mg-b-10"><a href="{{ route('admin.dashboard') }}"
                    class="text-white">Dashboad</a></button>
            <button class="btn btn-sm btn-primary active btn-block mg-b-10"><a href="{{ route('manage.products') }}"
                    class="text-white">Manage Product</a></button>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="form-layout form-layout-1">
            <form action="{{ route('product.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mg-b-25">
                    <!-- PRODUCT CODE -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Product Code:</b> <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_code" value="{{ old('product_code') }}"
                                placeholder="Enter Product Code.....">
                            @error('product_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Product Name -->

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Product Name:</b> <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="product_name" value="{{ old('product_name') }}"
                                placeholder="Enter Product Name.....">
                            @error('product_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- PRODUCT PRICE -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Product Price:</b> <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="product_price"
                                value="{{ old('product_price') }}" placeholder="Enter Product Price.....">
                            @error('product_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- PRODUCT DISCOUNT PRICE -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Product Discount Price:</b> <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="discount_price"
                                value="{{ old('discount_price') }}" placeholder="Enter Product Discount Price.....">
                            @error('discount_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- PRODUCT QUANTITY -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Product Quantity:</b> <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="quantity" value="{{ old('quantity') }}"
                                placeholder="Enter Product Quantity.....">
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- CATEGORY ID -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"><b>Product Category:</b><span
                                    class="tx-danger">*</span></label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('cat_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- SUB CATEGORY ID -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label"><b>Product SubCategory:</b><span
                                    class="tx-danger">*</span></label>
                            <select name="subcat_id" id="subcat_id" class="form-control">
                                <option value="">Select SubCategory</option>

                            </select>
                        </div>
                        @error('subcat_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Product Thumbnails  -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Product Thumbnails:</b> <span
                                    class="tx-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" name="thumbnails" id="inputImage" class="custom-file-input">
                                <label class="custom-file-label bg-secondary tx-white">----- Product Thumbnail
                                    ------</label>
                            </div>
                            @error('thumbnails')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="text-center mt-4">
                                <img width="100" id="showImage" src="{{ asset('backend/assets/img/img11.jpg') }}"
                                    class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Product GALLERY  -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Product Gallery:</b> <span
                                    class="tx-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" multiple name="images[]" id="file" class="custom-file-input">
                                <label class="custom-file-label bg-secondary tx-white">----- Product Gallery ------</label>
                            </div>
                            <!--<div class="text-center mt-3">-->
                            <!--   <img width="100" src="{{ asset('backend/assets/img/img11.jpg') }}" class="img-fluid" alt="">-->
                            <!--</div> -->
                        </div>
                    </div>
                    <!-- Product Short Description: -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Product Short Description:</b> <span
                                    class="tx-danger">*</span></label>
                            <textarea rows="3" cols="3" class="form-control" name="short_desc"
                                placeholder="Product Short Description.....">{{ old('short_desc') }}</textarea>
                            @error('short_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Product LONG Description: -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Product Long Description:</b> <span
                                    class="tx-danger">*</span></label>
                            <textarea rows="3" col="3" id="summernote" class="form-control" name="long_desc">{{ old('long_desc') }}</textarea>
                            @error('long_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- FOOTER BUTTON -->
                    <div class="col-lg-2">
                        <div class="form-group mg-t-20-force">
                            <div class="form-layout-footer">
                                <button type="submit" class="btn btn-sm btn-primary active btn-block mg-b-10"><b>ADD
                                        PRODUCT</b></button>
                            </div><!-- form-layout-footer -->
                        </div>
                    </div>
                </div><!-- row -->
            </form>
        </div>
    </div><!-- br-pagebody -->

    <script>
        jQuery(document).ready(function() {
            jQuery(document).on('change', '#cat_id', function() {
                var cat_id = jQuery(this).val();
                $.ajax({
                    url: 'searchcategory',
                    dataType: 'JSON',
                    type: 'GET',
                    data: {
                        'cat_id': cat_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Subcategory </option>';
                        $.each(data.subcategorygggg, function(key, subcate) {
                            html += '<option value="' + subcate.id + '">' + subcate
                                .sub_name + '</option>';
                        });
                        jQuery('#subcat_id').html(html);
                    }
                });
            });
        });
    </script>
@endsection
