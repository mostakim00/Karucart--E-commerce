@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Product | Manage | KaruKart 
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
            <button class="btn btn-sm btn-primary active btn-block mg-b-10"><a href="{{ route('add.products') }}"
                    class="text-white">Add Product</a></button>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row row-sm mg-t-20">
            <div class="col-lg-12">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-3p">#sl</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Vendor</th>
                            <th class="wd-15p">Pro-Code</th>
                            <th class="wd-5p">Price</th>
                            <th class="wd-15p">Discount Price</th>
                            <th class="wd-5p">Quantity</th>
                            <th class="wd-5p">Category</th>
                            <th class="wd-15p">Picture</th>
                            <th class="wd-6p">Status</th>
                            <th class="wd-15p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <th scope="row">{{ $key += 1 }}</th>
                                <td>{{ $product->product_name }}</td>
                                {{-- <td>{{ $product->username->name }}</td> --}}
                                <td>{{ optional($product->vendor)->name }}</td>
                                <td>{{ $product->product_code}}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @foreach ($category as $cat)
                                        @if ($product->cat_id == $cat->id)
                                            {{ $product->category->category_name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td><img height="60" width="80" id="showImage"
                                        src="{{ asset('backend/productImage/' . $product->thumbnails) }}" class="img-fluid"
                                        alt="PRODUCT IMAGE"></td>
                                <td>
                                    @if ($product->status == 1)
                                        <span class="badge badge-info">Approved</span>
                                    @else
                                        <span class="badge badge-info">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->status == 0)
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('product.delete', $product->id) }}" id="delete"
                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        @elseif($product->status == 1)
                                        <a  id="Approved"
                                        class="btn btn-sm btn-info text-white"><i class="fa fa-check"></i></a>
                                       @endif 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- col-8 -->
        </div><!-- row -->
    </div><!-- br-pagebody -->
    <script>
        $(function() {
            $('#datatable1').DataTable();
            // _MENU_ items/page
        });

        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>
@endsection
