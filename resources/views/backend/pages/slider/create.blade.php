@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Slider | Create | KaruKart 
@endsection
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>@yield('title')</h4>
        <p class="mg-b-0">From here you can manage all your Sliders'</p>
    </div>
</div>
<div class="br-pagebody">
    <div class="card">
        <div class="card-header">
            <h4>Slider's<a href={{ Route('manageSlider') }} type="button" class="btn btn-primary" style="float: right;">Manage Slider</a></h4>
        </div>
        <div class="card-body">
        <form action="{{ Route('storeSlider') }}" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="status">Product Name</label>
                <select class="form-control" name="product_name" id="product_name">
                    <option value="">------Select Product Name------</option>
                    @foreach($productdetailes as $productdetaile)
                    <option value="{{ $productdetaile->id }}">{{ $productdetaile->product_name }}</option>
                    @endforeach
                </select>
            </div>  
            <div class="form-group">
                <label for="product_name">Product Category</label>
                <input class="form-control" type="text" name="product_category" id="product_category" placeholder="Category" value="">
                <span class="text-danger">
                    @error('product_category')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="product_name">Product Price</label>
                <input class="form-control" type="text" name="product_price" id="product_price" placeholder="Price" value="">
                <span class="text-danger">
                    @error('product_price')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="product_name">Product Discount Price</label>
                <input class="form-control" type="text" name="product_disPrice" id="product_disPrice" placeholder="Discount Price" value="">
                <span class="text-danger">
                    @error('product_disPrice')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="product_name">Slider Title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="Title" value="">
                <span class="text-danger">
                    @error('title')
                    {{$message}}
                    @enderror
                </span>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="short_desc">Description</label>
                <textarea class="form-control" type="text" name="description" id="description" placeholder="Description" rows="3">{{old('description')}}</textarea>
                <span class="text-danger">
                    @error('description')
                    {{$message}}
                    @enderror
                </span>
            </div>
                <div class="form-group">
                    <label for="file">Choose Image File to Upload</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="">------Select Status------</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Add Slider</button>
                </div>  
                </div>
             </div>
         </div>
        </form>
    </div>
</div>














<!-- for toastr  -->
<script>
  //for product jQuery
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
</script>

@endsection
