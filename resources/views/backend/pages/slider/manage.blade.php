@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Slider | Manage | KaruKart 
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
            <h4>Slider's<a href={{ Route('createSlider') }} type="button" class="btn btn-primary" style="float: right;">Add Slider</a></h4>
        </div>
        <div class="card-body">
            <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-5p">SL#</th>
                            <th class="wd-10p">Product Name</th>
                            <th class="wd-15p">Product Category</th>
                            <th class="wd-15p">Price</th>
                            <th class="wd-10p">Discount Price</th>
                            <th class="wd-25p">Title</th>
                            <th class="wd-25p">Description</th>
                            <th class="wd-25p">Image</th>
                            <th class="wd-25p">Status</th>
                            <th class="wd-25p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           @php $sl=1; @endphp
                           @foreach($sliderinfo as $sliderdata)

                            <td>{{ $sl }}</td>
                            <td>{{ $sliderdata->product_name }}</td>
                            <td>{{ $sliderdata->product_category }}</td>
                            <td>{{ $sliderdata->product_price }}</td>
                            <td>{{ $sliderdata->product_disPrice }}</td>
                            <td>{{ $sliderdata->title }}</td>
                            <td>{{ $sliderdata->description }}</td>
                            <td><img height="80" src="{{ asset('backend/sliderImages/'.$sliderdata->image) }}" alt=""></td>
                            <td>
                                @if($sliderdata->status==1)
                                    <span class="badge badge-info">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn btn-sm" data-toggle="modal" data-target="#exampleModalupdate{{$sliderdata->id}}" style="float: right;"><i class="fas fa-edit"></i></button>
                                <button data-toggle="modal" data-target="#delete{{$sliderdata->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                            
                        </tr>
                        @php $sl++ @endphp
                    
                        


<!-- Modal for Update -->

<div class="modal fade" id="exampleModalupdate{{$sliderdata->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Slider Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
      
        
            <form action="{{ route('updateSlider',$sliderdata->id) }}" method="post" enctype="multipart/form-data">
                @csrf <!--   hack protect | it's generate a token for protection from hack| -->
                <input type="hidden" name="slider_id" value="{{ $sliderdata->id }}">
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="Slider Title" value="{{ $sliderdata->title }}">
                    <span class="text-danger">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="short_desc">Description</label>
                    <textarea class="form-control" type="text" name="description" id="description" placeholder="Description" rows="3" value="">{{$sliderdata->description}}</textarea>
                    <span class="text-danger">
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="title">Product Price</label>
                    <input class="form-control" type="text" name="product_price" id="product_price" placeholder="Slider Title" value="{{ $sliderdata->product_price }}">
                    <span class="text-danger">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="title">Product Discount Price</label>
                    <input class="form-control" type="text" name="product_disPrice" id="product_disPrice" placeholder="Slider Title" value="{{ $sliderdata->product_disPrice }}">
                    <span class="text-danger">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="file">Choose Image File to Upload</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <img height="80" id="image_preview" src="{{ asset('backend/sliderImages/'.$sliderdata->image) }}" alt="">

                <div class="form-group">
                    <label for="title">Slug</label>
                    <input class="form-control" type="text" name="slug" id="slug" value="{{ $sliderdata->slug }}">
                    <span class="text-danger">
                        @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="">------Select Status------</option>
                        <option value="1" @if($sliderdata->status==1) selected @endif>Active</option>
                        <option value="2" @if($sliderdata->status==2) selected @endif>Inactive</option>
                    </select>
                </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal for Update: end  -->

<!-- Delete  Modal -->

<div class="modal fade" id="delete{{ $sliderdata->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="{{ Route('deleteSlider',$sliderdata->id) }}" class="btn btn-danger">Confirm</a>
      </div>
    </div>
  </div>
</div>





@endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div>
    </div>
</div><!-- br-pagebody -->

<script>
    // custom image upload preview 
    jQuery('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) =>{
            jQuery('#image_preview').attr('src',e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
    
    
</script>


<script>
    $(function() {
            $('#datatable1').DataTable({
               
            });
        });
    
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
</script>

<!-- for toastr  -->




@endsection
