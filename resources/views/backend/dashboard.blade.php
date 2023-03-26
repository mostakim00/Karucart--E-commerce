@extends('backend.masterTemplate.masterBackend')
@section('maincontent')
@section('title')
 Wellcome | KaruKart | Admin 
@endsection
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>@yield('title')</h4>
            <p class="mg-b-0">Hey! Hello There Welcome To Our MultiVenDor Ecommerce Dashboard !</p>
        </div>
    </div>
    <div class="br-pagebody">
        <div class="row row-sm">
        @if (Auth::user()->role['id'] === 3)
            @php
                $produts = App\Models\Backend\Product::where('vendor_id', Auth::user()->id)->get();
                $topProducts = App\Models\Backend\Product::where('vendor_id', Auth::user()->id)
                    ->limit(5)
                    ->get();
                $approveProduct = App\Models\Backend\Product::where('vendor_id', Auth::user()->id)
                    ->where('status', 1)
                    ->get();
                $pandingProduct = App\Models\Backend\Product::where('vendor_id', Auth::user()->id)
                    ->where('status', 0)
                    ->get();
            @endphp
            <div class="col-sm-6 col-xl-3">
                <div class="bg-info rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="icon ion-filing tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                Total Product
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ count($produts) }}</p>
                        </div>
                    </div>
                    <div class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-purple rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="icon ion-pie-graph tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                Total Order
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">0</p>
                        </div>
                    </div>
                    <div class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-primary  rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="icon ion-clock tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                Total Sales
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">$0.0</p>
                        </div>
                    </div>
                    <div class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-danger rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="icon ion-filing tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                Approve Product
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ count($approveProduct) }}</p>
                        </div>
                    </div>
                    <div class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-lg-6 mg-t-20 mg-lg-t-0 mt-3">
                <div class="card shadow-base bd-0">
                    <div class="card-header pd-20 bg-transparent">
                        <h6 class="card-title tx-uppercase tx-12 mg-b-0">Last Approve Product</h6>
                    </div><!-- card-header -->
                    <table class="table table-responsive mg-b-0 tx-12">
                        <thead>
                            <tr class="tx-10">
                                <th class="wd-10p pd-y-5">&nbsp;</th>
                                <th class="pd-y-5">Item Details</th>
                                <th class="pd-y-5 tx-right">Price</th>
                                <th class="pd-y-5">SKU</th>
                                <th class="pd-y-5 tx-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approveProduct as $product)
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="{{ asset('backend/productImage/' . $product->thumbnails) }}"
                                            class="wd-55" alt="Image">
                                    </td>
                                    <td>
                                        <a class="tx-inverse tx-14 tx-medium d-block">{{ $product->product_name }}</a>
                                        <span class="tx-11 d-block"><span
                                                class="square-8 bg-success mg-r-5 rounded-circle"></span> In
                                            stock</span>
                                    </td>
                                    <td class="valign-middle tx-right">${{ $product->product_price }}</td>
                                    <td class="valign-middle">{{ $product->product_code }}
                                    </td>
                                    <td class="valign-middle tx-center">
                                        <a href="" class="tx-gray-600 tx-15">
                                            <span class="tx-11 d-block">
                                                <span class="square-8 bg-success mg-r-5 rounded-circle"></span>
                                                Approve
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- card -->
            </div>
            <div class="col-lg-6 mg-t-20 mg-lg-t-0 mt-3">
                <div class="card shadow-base bd-0">
                    <div class="card-header pd-20 bg-transparent">
                        <h6 class="card-title tx-uppercase tx-12 mg-b-0"> Last Pending Product</h6>
                    </div><!-- card-header -->
                    <table class="table table-responsive mg-b-0 tx-12">
                        <thead>
                            <tr class="tx-10">
                                <th class="wd-10p pd-y-5">&nbsp;</th>
                                <th class="pd-y-5">Item Details</th>
                                <th class="pd-y-5 tx-right">Price</th>
                                <th class="pd-y-5">SKU</th>
                                <th class="pd-y-5 tx-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pandingProduct as $product)
                                <tr>
                                    <td class="pd-l-20">
                                        <img src="{{ asset('backend/productImage/' . $product->thumbnails) }}"
                                            class="wd-55" alt="Image">
                                    </td>
                                    <td>
                                        <a class="tx-inverse tx-14 tx-medium d-block">{{ $product->product_name }}</a>
                                        <span class="tx-11 d-block"><span
                                                class="square-8 bg-success mg-r-5 rounded-circle"></span> In
                                            stock</span>
                                    </td>
                                    <td class="valign-middle tx-right">${{ $product->product_price }}</td>
                                    <td class="valign-middle">{{ $product->product_code }}
                                    </td>
                                    <td class="valign-middle tx-center">
                                        <a href="" class="tx-gray-600 tx-15">
                                            <span class="tx-11 d-block">
                                                <span class="square-8 bg-warning mg-r-5 rounded-circle"></span>
                                                Pending
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- card -->
            </div>
            <div class="col-lg-12 mg-t-20 mg-lg-t-0 my-3">
                <div class="bg-gray-300 ht-100 d-flex align-items-center justify-content-center mg-t-20">
                    <h6 class="tx-uppercase mg-b-0 tx-roboto tx-normal tx-spacing-2">Copyright © {{ date('Y') }}.
                        Karu Cart. All
                        Rights Reserved.</h6>
                </div>
            </div>
        @else
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-info rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-bag tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10  tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Product
                                </p>
                                <p class="tx-20 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$product_approve}}</p>
                            </div>
                        </div>
                        <div id="ch1" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                    <div class="bg-purple rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-bag tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">TOTAL CUSTOMER
                                </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$user}}</p>
                            </div>
                        </div>
                        <div id="ch3" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-teal rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-monitor tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Approved PRODUCT</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$producttable_approve}}</p>
                            </div>
                        </div>
                        <div id="ch2" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-clock tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">TOTAL SLIDER
                                </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$slider_total}}</p>
                            </div>
                        </div>
                        <div id="ch4" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-2 mt-3">
                    <div class="bg-secondary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-bag tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10  tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Category
                                </p>
                                <p class="tx-20 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$categorytotal}}</p>
                            </div>
                        </div>
                        <div id="ch1" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-2 mt-3 mg-sm-t-0">
                    <div class="bg-secondary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-bag tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">TOTAL COUPON
                                </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$couponTotal}}</p>
                            </div>
                        </div>
                        <div id="ch3" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->

                <div class="col-sm-6 col-xl-2 mt-3 mg-xl-t-0">
                    <div class="bg-secondary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-monitor tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">PENDING PRODUCT</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$product_product}}</p>
                            </div>
                        </div>
                        <div id="ch2" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-2 mt-3 mg-xl-t-0">
                    <div class="bg-secondary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-clock tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Subcategory Total
                                </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$subcategory_total}}</p>
                            </div>
                        </div>
                        <div id="ch4" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                               <div class="col-sm-6 col-xl-2 mt-3">
                    <div class="bg-secondary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-bag tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10  tx-semibold tx-uppercase tx-white-8 mg-b-10">Pending SubCategory
                                </p>
                                <p class="tx-20 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$subcategory_pending}}</p>
                            </div>
                        </div>
                        <div id="ch1" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-2 mt-3 mg-sm-t-0">
                    <div class="bg-secondary rounded overflow-hidden">
                        <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                            <i class="ion ion-bag tx-40 lh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Pending Category
                                </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{$pendingcategory}}</p>
                            </div>
                        </div>
                        <div id="ch3" class="ht-50 tr-y-1"></div>
                    </div>
                </div><!-- col-3 -->
                <div class="row row-sm mg-t-20">
          <div class="col-lg-4">
            <div class="card shadow-base bd-0">
              <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Latest Category</h6>
              </div><!-- card-header -->
              <table class="table table-responsive mg-b-0 tx-12" style="margin-right:350px;">
                <thead>
                  <tr class="tx-10">
                    <th class="wd-10p pd-y-5">Image</th>
                    <th class="pd-y-5">NAME</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($category as $cat)
                  <tr>
                    <td class="pd-l-20">
                      <img src="{{asset('backend/img/'.$cat->image)}}" class="wd-55" alt="Image">
                    </td>
                    <td>
                      <a class="tx-inverse tx-14 tx-medium d-block">{{$cat->category_name}}</a>
                      <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span></span>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              
              <div class="card-footer tx-12 pd-y-15 bg-transparent">
                <a href="{{route('category.manage')}}"><i class="fa fa-angle-down mg-r-5"></i>View All Category</a>
              </div><!-- card-footer -->
            </div><!-- card -->
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="card shadow-base bd-0">
              <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Latest Product</h6>
              </div><!-- card-header -->
              <table class="table table-responsive mg-b-0 tx-12" style="margin-right:350px;">
                <thead>
                  <tr class="tx-10">
                    <th class="wd-10p pd-y-5">Image</th>
                    <th class="pd-y-5">NAME</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($Product as $pro)
                  <tr>
                    <td class="pd-l-20">
                      <img src="{{asset('backend/productimage/'.$pro->thumbnails)}}" class="wd-55" alt="Image">
                    </td>
                    <td>
                      <a class="tx-inverse tx-14 tx-medium d-block">{{Str::limit($pro->product_name,40)}}</a>
                      <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span></span>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              
              <div class="card-footer tx-12 pd-y-15 bg-transparent">
              <a href="{{route('manage.products')}}"><i class="fa fa-angle-down mg-r-5"></i>Manage Product</a>
              </div><!-- card-footer -->
            </div><!-- card -->
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="card shadow-base bd-0">
              <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Latest Coupon</h6>
              </div><!-- card-header -->
              <table class="table table-responsive mg-b-0 tx-12">
                <thead>
                  <tr class="tx-10">
                    <th class="wd-10p pd-y-5">Code</th>
                    <th class="pd-y-5">Discount Price</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($coupons as $coupon)
                  <tr>
                    <td class="pd-l-20">
                     <a class="tx-inverse tx-14 tx-medium d-block">{{$coupon->coupon_code}}</a>
                     <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span></span>
                    </td>
                    <td>
                      <a class="tx-inverse tx-14 tx-medium d-block">{{$coupon->discount_amount}}</a>
                      <span class="tx-11 d-block"><span class="square-8 bg-success mg-r-5 rounded-circle"></span></span>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              
              <div class="card-footer tx-12 pd-y-15 bg-transparent">
                <a href="{{route('admin.coupon.manage')}}"><i class="fa fa-angle-down mg-r-5"></i>Manage All Coupon</a>
              </div><!-- card-footer -->
            </div><!-- card -->
          </div><!-- col-4 -->

        </div>
            @endif
        </div><!-- row -->

    </div><!-- br-pagebody -->
@endsection
