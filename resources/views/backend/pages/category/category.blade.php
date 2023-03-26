@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Category | Manage | KaruKart 
@endsection
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
    <h4>@yield('title')</h4>
        <p class="mg-b-0">Hey! Hello There Welcome To Our MultiVenDor Ecommerce Dashboard !</p>
    </div>
</div>

<div class="br-pagebody">
    <div class="#card">
        {{--  card header and category added button --}}
        <div class="card-header">
            <h4>All Category <a class="btn btn-info btn-sm" href="" style="float: right;" data-toggle="modal"
                    data-target="#addcategory">Add Category</a></h4>
        </div>
        <!-- category add Modal -->
        <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!--end Modal Header -->
                    <!--  Modal Body -->
                    <div class="modal-body">
                        <!--  category added form -->
                        <form method="post" action="{{Route('category.store')}}" id="categoryData"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" name="category_name" id="category_name"
                                    placeholder=" Enter your Category Name">
                                <span class="text-danger catNameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="category_des">Category Drescreption</label>
                                <textarea class="form-control" name="category_des" id="category_des" rows="4"
                                    placeholder=" Enter your Category Drescreption"></textarea>
                                <span class="text-danger catDesError"></span>
                            </div>
                            <div class="form-group">
                                <label for="category_img">Category Image</label>
                                <input type="file" name="category_img" class="form-control" id="category_img">
                                <span class="text-danger catImgError"></span>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1">=====Status======</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                    </div><!-- end Modal Body -->
                    <!--  Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary addcategory">Add</button>
                    </div><!-- End Modal Footer -->
                    </form><!-- end category added form -->
                </div>
            </div>
        </div><!-- End Modal -->
        <div class="card-body">
            <div class="table-data">
            <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-5p">#SL</th>
                            <th class="wd-20p">Name</th>
                            <th class="wd-30p">Drescreption</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-6p">Status</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                    </thead>
                    <tbody class="tbodydata">
                        @foreach($categoryData as $category)
                        <tr>
                            <td>{{$serial++}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->category_des}}</td>
                            <td><img width="70px" height="50px" src="{{asset('backend/img/'.$category->image)}}"
                                    alt="category"></td>
                            <td>
                                @if($category->status=="1")
                                <span class="badge badge-info">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" value="{{$category->id}}" data-target="#catEditModal"
                                    data-toggle="modal" class="catEdit btn btn-sm btn-info"><i
                                        class="fa fa-edit"></i></button>
                                <button type="button" value="{{$category->id}}" id=""
                                    class="catDelete btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!------- category edit Modal ------------->
                <div class="modal fade" id="catEditModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!--end Modal Header -->
                            <!--  Modal Body -->
                            <div class="modal-body">
                                <!--  category Update form -->
                                <form method="post" id="editcategoryData" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="" id="catid">
                                    <div class="form-group">
                                        <label for="eidit_category_name">Category Name</label>
                                        <input type="text" class="form-control" name="category_update_name"
                                            id="eidit_category_name" placeholder=" Enter your Category Name">
                                        <span class="text-danger catUpdateNameError"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="eidit_category_des">Category Drescreption</label>
                                        <textarea class="form-control" name="category_update_des"
                                            id="eidit_category_des" rows="4"
                                            placeholder=" Enter your Category Drescreption"></textarea>
                                        <span class="text-danger catUpdateNameDesError"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_img">Category Image</label>
                                        <input type="file" name="category_update_img" class="form-control"
                                            id="category_img">
                                        <span class="text-danger catUpdateNameImgError"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="eidit_status" name="update_status">
                                            <option value="">=====Status======</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                            </div><!-- end Modal Body -->
                            <!--  Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary addcategory">Update</button>
                            </div><!-- End Modal Footer -->
                            </form><!-- end category added form -->
                        </div>
                    </div>
                </div><!-- End Modal -->
            </div><!-- table-wrapper -->
        </div>
    </div>
</div><!-- br-pagebody -->
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
@endsection