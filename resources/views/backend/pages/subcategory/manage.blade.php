@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Subcategory | Manage | KaruKart 
@endsection
<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
        <h4>@yield('title')</h4>
        <p class="mg-b-0">Hey! Hello There Welcome To Our MultiVenDor Ecommerce Dashboard !</p>
    </div>
</div>

<div class="br-pagebody">


    <!---------- TABLE --------->
    <div class="#card">
        <div class="card-header">
            <div class="card-title">Sub Category List
                <button class="btn btn-sm btn-primary float-right text-light" data-toggle="modal"
                    data-target="#exampleModal">Add New</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-5p">#SL</th>
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-10p">Status</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl=1 @endphp
                        @foreach($subCategories as $sub)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{$sub->category->category_name}}</td>
                            <td>{{ $sub->sub_name }}</td>
                            <td><img src="{{ asset("backend/uploads/subCategory/".$sub->sub_image) }}" height="50px"
                                    weidth="70px" alt=""></td>
                            <td>@if($sub->sub_status==1)<span class="badge badge-info">Active</span>

                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <button data-toggle="modal" value="{{ $sub->id }}"
                                data-target="#editSubcategory" class=" subcatEdit btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                                <button value="{{ $sub->id }}" class="btn btn-sm btn-danger subcatDelete"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div>
    </div>
</div><!-- br-pagebody -->

<!-- Add Sub-Category Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sub-Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="subCategoryData" action="{{ Route('subcategory.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="" class="form-label">Category Name</label>
                        <select class="form-control" name="category_id" id="">
                            <option> Category Name</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Name</label>
                        <input class="form-control name" type="text" name="sub_name">
                        <span class="subcatnameerror text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Image</label>
                        <input class="form-control img" type="file" name="sub_image">
                        <span class="subcatimageerror text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Status</label>
                        <select class="form-control status" name="subcat_status" id="">
                            <option value="1">===select status==== </option>
                            <option value="1">Active </option>
                            <option value="2">InActive</option>
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary addsubCategory">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Sub-Category Modal -->
<div class="modal fade" id="editSubcategory" tabindex="-1" aria-labelledby="editSubcategory" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sub-Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editsubCategoryData"  method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="subcatid" id="subcatid">
                    <div class="form-group">
                        <label for="" class="form-label">Category Name</label>
                        <select class="form-control" name="category_id" id="">
                            <option> Category Name</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}"</option>)>{{$cat->category_name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Name</label>
                        <input class="form-control name" id="editsubName" type="text" name="update_sub_name">
                        <span class="updatesubcatnameerror text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Image</label>
                        <input class="form-control img" id="editsubimg" type="file" name="updatesub_image">
                        <span class="updatesubcatimageerror text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Status</label>
                        <select class="form-control status" name="update_subcat_status" id="editsubStatus">
                            <option value="1">Active </option>
                            <option value="2">InActive</option>
                        </select>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary addsubCategory">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

 <script>
    $(function(){
    'use strict';

    $('#datatable1').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_',
        }
    });
   // _MENU_ items/page

      // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

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
