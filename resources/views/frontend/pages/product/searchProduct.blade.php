@extends('frontend.master_template.template')
@section('body')
@section('title')
    Search | Product
@endsection
    <!-- breadcrumb_section - start
                    ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="index.html">Home</a></li>
                <li>Product Search</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
                    ================================================== -->
    <section class="product_section section_space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar_section p-0 mt-0">
                        <div class="sb_widget sb_category">
                            <h3 class="sb_widget_title">Subcategories</h3>
                            <ul class="sb_category_list ul_li_block">
                                @foreach($subcategorys as $subcategory)
                                    @php 
                                        //count product of each subcategory
                                        $subcatProduct = App\Models\Backend\Product::subProductCount($subcategory->id)
                                    @endphp
                                    <li>
                                        <a>{{$subcategory->sub_name}}<span>({{$subcatProduct}})</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9">
                    <div class="filter_topbar">
                        <div class="row align-items-center">
                            <div class="col col-md-4">
                                <ul class="layout_btns nav" role="tablist">
                                    <li>
                                        <button class="active" data-bs-toggle="tab" data-bs-target="#home" type="button"
                                            role="tab" aria-controls="home" aria-selected="true"><i
                                                class="fal fa-bars"></i></button>
                                    </li>
                                    <li>
                                        <button data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">
                                            <i class="fal fa-th-large"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col col-md-3 text-md-end">
                                <div class="result_text text-md-end">Showing {{$products->count()}} Products</div>
                            </div>
                        </div>
                    </div>

                    <hr/>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="shop-product-area shop-product-area-col">
                                <div class="product product-area shop-grid-product-area clearfix">
                                    @foreach($products as $product)
                                        <div class="grid">
                                            <div class="product-pic">
                                            <img src="{{asset('backend/productImage/'.$product->thumbnails)}}" alt />
                                            @if($product->discount_price>0)
                                                <span class="theme-badge-2">${{$product->discount_price}} off</span>
                                            @endif
                                            @if($product->quantity==0)
                                                <span class="theme-badge-2 bg-danger">Out of stock</span>
                                            @endif
                                            <div class="actions">
                                                <ul>
                                                    <li class="pro_iddhore">
                                                        <a class="addtowishlist"><i class="far fa-heart"></i></a>
                                                        <input type="hidden" class="pro_id" value="{{$product->id}}">
                                                        </a>
                                                   </li>
                                                    <li>
                                                        <a class="quickview_btn" data-bs-toggle="modal"
                                                            href="#quickview_popup{{$product->id}}" role="button" tabindex="0">
                                                            <svg width="48px" height="48px" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg" stroke="#2329D6"
                                                                stroke-width="1" stroke-linecap="square"
                                                                stroke-linejoin="miter" fill="none" color="#2329D6">
                                                                <title>Visible (eye)</title>
                                                                <path
                                                                    d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                                <circle cx="12" cy="12" r="3" />
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            </div>
                                            <div class="details">
                                            <h4><a href="{{route('productdetails',$product->product_slug)}}">{{$product->product_name}}</a></h4>
                                            <p><a href="{{route('productdetails',$product->product_slug)}}">{{$product->short_desc}} </a></p>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <span class="price">
                                                {{-- discount price if product have discount --}}
                                                @if($product->discount_price > 0)
                                                    <ins>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi> <span class="woocommerce-Price-currencySymbol">$</span>{{($product->product_price)-($product->discount_price)}}
                                                            </bdi>
                                                        </span>
                                                    </ins>
                                                    <del aria-hidden="true">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi> <span class="woocommerce-Price-currencySymbol">$</span>{{$product->product_price}}</bdi>
                                                        </span>
                                                    </del>
                                                {{-- product haven't discount --}}
                                                @else
                                                    <ins>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi> <span class="woocommerce-Price-currencySymbol">$</span>{{($product->product_price)}}
                                                            </bdi>
                                                        </span>
                                                    </ins>
                                                @endif

                                            </span>
                                            <div class="add-cart-area">
                                                <button id="product_id" value="{{ $product->id }}" class="add-to-cart">Add to cart</button>
                                            </div>
                                            </div>
                                            </div>

                                    <!-- product quick view modal - start
            ================================================== -->
<div class="modal fade" id="quickview_popup{{$product->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="product_details">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="product_details_image p-0">
                                    <img src="{{asset('backend/productImage/'.$product->thumbnails)}}" alt>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="product_details_content">
                                    <h2 class="item_title">{{$product->product_name}}</h2>
                                    <p>{{$product->short_desc}}</p>
                                    <div class="item_review">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <span class="review_value">3 Rating(s)</span>
                                    </div>
                                    <div class="item_price">
                                        @if($product->discount_price > 0)
                                            <span>${{($product->product_price)-($product->discount_price)}}</span>
                                            <del>${{$product->product_price}}</del>
                                        @else
                                            <span>${{$product->product_price}}</span>
                                        @endif


                                    </div>
                                    <hr>


                                    <div class="quantity_wrap">
                                        <form action="#">
                                            <div class="quantity_input">
                                                <button type="button" class="input_number_decrement">
                                                    <i class="fal fa-minus"></i>
                                                </button>
                                                <input class="input_number" type="text" value="1">
                                                <button type="button" class="input_number_increment">
                                                    <i class="fal fa-plus"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <div class="total_price">
                                            Total: $620,99
                                        </div>
                                    </div>

                                    <ul class="default_btns_group ul_li">
                                        <li><a class="addtocart_btn" href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                        <li><a href="#!"><i class="fas fa-heart"></i></a></li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product quick view modal - end
            ================================================== -->

                @endforeach 
                    </div>
                </div>
                

                <div class="pagination_wrap">
                    {{-- <ul class="pagination_nav">
                        <li class="active"><a href="#!">01</a></li>
                        <li><a href="#!">02</a></li>
                        <li><a href="#!">03</a></li>
                        <li class="prev_btn">
                            <a href="#!"><i class="fal fa-angle-left"></i></a>
                        </li>
                        <li class="next_btn">
                            <a href="#!"><i class="fal fa-angle-right"></i></a>
                        </li>
                    </ul> --}}
                    {{-- {!! $products->links() !!} --}}
                </div>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel">
                <div class="product_layout2_wrap">
                    <div class="product-area-row">
                        <!--************database product show start in clearfix *********-->
                        @foreach($products as $product)
                        <div class="grid clearfix">
                            <div class="product-pic">
                                <img src="{{asset('backend/productImage/'.$product->thumbnails)}}" alt />
                                @if($product->discount_price>0)
                                    <span class="theme-badge">${{$product->discount_price}} off</span>
                                @endif
                                @if($product->quantity==0)
                                    <span class="theme-badge-2 bg-danger">Out of stock</span>
                                @endif
                                <div class="actions">
                                    <ul>
                                        <li class="pro_iddhore">
                                            <a class="addtowishlist"><i class="far fa-heart"></i></a>
                                            <input type="hidden" class="pro_id" value="{{$product->id}}">
                                            </a>
                                        </li>
                                        <li>
                                            <a class="quickview_btn" data-bs-toggle="modal"
                                                href="#quickview_popup-2{{$product->id}}" role="button" tabindex="0">
                                                <svg width="48px" height="48px" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" stroke="#2329D6"
                                                    stroke-width="1" stroke-linecap="square"
                                                    stroke-linejoin="miter" fill="none" color="#2329D6">
                                                    <title>Visible (eye)</title>
                                                    <path
                                                        d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="details">
                                <h4><a href="{{route('productdetails',$product->product_slug)}}">{{$product->product_name}}</a></h4>
                                <p><a href="{{route('productdetails',$product->product_slug)}}">{{$product->short_desc}}</a></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="price">
                                    {{-- discount price if product have discount --}}
                                    @if($product->discount_price > 0)
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi> <span class="woocommerce-Price-currencySymbol">$</span>{{($product->product_price)-($product->discount_price)}}
                                                </bdi>
                                            </span>
                                        </ins>
                                        <del aria-hidden="true">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi> <span class="woocommerce-Price-currencySymbol">$</span>{{$product->product_price}}</bdi>
                                            </span>
                                        </del>
                                    {{-- product haven't discount --}}
                                    @else
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi> <span class="woocommerce-Price-currencySymbol">$</span>{{($product->product_price)}}
                                                </bdi>
                                            </span>
                                        </ins>
                                    @endif

                                </span>
                                <div class="add-cart-area">
                                    <button class="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div>
                                     <!-- product quick view modal - start
            ================================================== -->
<div class="modal fade" id="quickview_popup-2{{$product->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="product_details">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="product_details_image p-0">
                                    <img src="{{asset('backend/productImage/'.$product->thumbnails)}}" alt>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="product_details_content">
                                    <h2 class="item_title">{{$product->product_name}}</h2>
                                    <p>{{$product->short_desc}}</p>
                                    <div class="item_review">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <span class="review_value">3 Rating(s)</span>
                                    </div>
                                    <div class="item_price">
                                        @if($product->discount_price > 0)
                                            <span>${{($product->product_price)-($product->discount_price)}}</span>
                                            <del>${{$product->product_price}}</del>
                                        @else
                                            <span>${{$product->product_price}}</span>
                                        @endif


                                    </div>
                                    <hr>


                                    <div class="quantity_wrap">
                                        <form action="#">
                                            <div class="quantity_input">
                                                <button type="button" class="input_number_decrement">
                                                    <i class="fal fa-minus"></i>
                                                </button>
                                                <input class="input_number" type="text" value="1">
                                                <button type="button" class="input_number_increment">
                                                    <i class="fal fa-plus"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <div class="total_price">
                                            Total: $620,99
                                        </div>
                                    </div>

                                    <ul class="default_btns_group ul_li">
                                        <li><a class="addtocart_btn" href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                        <li><a href="#!"><i class="fas fa-heart"></i></a></li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product quick view modal - end
            ================================================== -->
                            @endforeach
                            </div>
                    </div>

                    <div class="pagination_wrap">
                        {{-- {!! $products->links() !!} --}}
                        {{-- <ul class="pagination_nav">
                            <li class="active"><a href="#!">01</a></li>
                            <li><a href="#!">02</a></li>
                            <li><a href="#!">03</a></li>
                            <li class="prev_btn">
                                <a href="#!"><i class="fal fa-angle-left"></i></a>
                            </li>
                            <li class="next_btn">
                                <a href="#!"><i class="fal fa-angle-right"></i></a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
    <!-- product_section - end
                    ================================================== -->
@endsection
