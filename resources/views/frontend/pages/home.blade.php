@extends('frontend.master_template.template')
@section('body')
@section('title')
    Karu || Cart
@endsection
<section class="slider_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="main_slider" data-slick='{"arrows": false}'>
                @foreach($sliderDetailes as $sliderInfo)
                    <div class="slider_item set-bg-image"
                        data-background="{{ asset('backend/sliderImages/'.$sliderInfo->image) }}">
                        <div class="slider_content">
                            <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">{{ $sliderInfo->product_category }}
                            </h3>
                            <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s"><span>{{ $sliderInfo->product->product_name }}</span>
                            </h4>
                            <p data-animation="fadeInUp2" data-delay=".6s">{{ $sliderInfo->description }}</p>
                            <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                <del>{{ $sliderInfo->product_price }}</del>
                                <span class="sale_price">{{ $sliderInfo->product_disPrice }}</span>
                            </div>
                            <a class="btn btn_primary" href="{{ Route('productdetails',$sliderInfo->product->product_slug) }}" data-animation="fadeInUp2"
                                data-delay=".8s">Start Buying</a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider_section - end -->

<!-- policy_section - start -->
<section class="policy_section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="policy-wrap">
                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Truck"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Free Shipping</h3>
                            <p>
                                Free shipping on all US order
                            </p>
                        </div>
                    </div>

                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Headset"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Support 24/ 7</h3>
                            <p>
                                Contact us 24 hours a day
                            </p>
                        </div>
                    </div>

                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Wallet"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">100% Money Back</h3>
                            <p>
                                You have 30 days to Return
                            </p>
                        </div>
                    </div>

                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Starship"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">90 Days Return</h3>
                            <p>
                                If goods have problems
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- policy_section - end -->


<!-- products-with-sidebar-section - start -->
<section class="products-with-sidebar-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-3">
                <div class="best-selling-products">
                    <div class="sec-title-link">
                        <h3>Best selling</h3>
                        <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="product-area clearfix">
                        @foreach($products as $product)
                        <div class="grid">
                            <div class="product-pic">
                                <img src="{{ asset('backend/productImage/'.$product->thumbnails)}}" alt>
                                <div class="actions">
                                    <ul>
                                        <li class="pro_iddhore">
                                            <a class="addtowishlist"><i class="far fa-heart"></i></a>
                                            <input type="hidden" class="pro_id" value="{{$product->id}}">
                                            </a>
                                        </li>
                                        <li>
                                            <a class="quickview_btn" data-bs-toggle="modal"
                                                href="#quickview_popup{{$product->id}}" role="button" tabindex="0"><svg
                                                    width="48px" height="48px" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1"
                                                    stroke-linecap="square" stroke-linejoin="miter" fill="none"
                                                    color="#2329D6">
                                                    <title>Visible (eye)</title>
                                                    <path
                                                        d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="details">
                                <h4><a
                                        href="{{route('productdetails',$product->product_slug)}}">{{$product->product_name}}</a>
                                </h4>
                                <p><a href="{{route('productdetails',$product->product_slug)}}">{!!Str::limit($product->short_desc,50)!!}
                                    </a></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="price">
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span
                                                    class="woocommerce-Price-currencySymbol">$</span>{{$product->product_price}}</bdi>
                                        </span>
                                    </ins>
                                </span>
                                <div class="add-cart-area">
                                    <button id="product_id" value="{{ $product->id }}" class="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div>
                        <!-- Product Quick View -->
                        <div class="modal fade" id="quickview_popup{{$product->id}}" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="product_details">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col col-lg-6">
                                                        <div class="product_details_image p-0">
                                                            <img src="{{ asset('backend/productImage/'.$product->thumbnails) }}"
                                                                alt>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="product_details_content">
                                                            <h2 class="item_title">{{$product->product_name}}</h2>
                                                            <p>
                                                                {!!Str::limit($product->short_desc,100) !!}
                                                            </p>
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
                                                                <span>${{$product->discount_price}}</span>
                                                                <del>${{$product->product_price}}</del>
                                                            </div>
                                                            <hr>

                                                            <div class="quantity_wrap">
                                                                <form action="#">
                                                                    <div class="quantity_input">
                                                                        <button type="button" id="decrementbutton"
                                                                            class="input_number_decrement">
                                                                            <i class="fal fa-minus"></i>
                                                                        </button>
                                                                        <input class="input_number" id="orginalvalue"
                                                                            type="text" value="1">
                                                                        <button type="button" id="incrementbutton"
                                                                            class="input_number_increment">
                                                                            <i class="fal fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                                <div class="total_price">
                                                                    Total: ${{$product->product_price}}
                                                                </div>
                                                            </div>

                                                            <ul class="default_btns_group ul_li">
                                                                <li><a class="addtocart_btn btniugyfuy" href="#!">Add To
                                                                        Cart</a></li>
                                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                                </li>
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
                        <!-- Product Quick View End -->
                        @endforeach
                    </div>
                </div>

                
                <div class="top_category_wrap">
                    <div class="sec-title-link">
                        <h3>Top categories</h3>
                    </div>
                    <div class="top_category_carousel2" data-slick='{"dots": false}'>
                        @foreach($categorys as $category)
                        <div class="slider_item">
                            <div class="category_boxed">
                                <a href="#!">
                                    <span class="item_image">
                                        <img src="{{asset('backend/img/'.$category->image)}}" alt="image_not_found">
                                    </span>
                                    <span class="item_title">{{$category->category_name}}</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="carousel_nav carousel-nav-top-right">
                        <button type="button" class="tc_left_arrow"><i class="fal fa-long-arrow-alt-left"></i></button>
                        <button type="button" class="tc_right_arrow"><i
                                class="fal fa-long-arrow-alt-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-9">
                <div class="product-sidebar">
                    <div class="widget latest_product_carousel">
                        <div class="title_wrap">
                            <h3 class="area_title">Latest Products</h3>
                            <div class="carousel_nav">
                                <button type="button" class="vs4i_left_arrow"><i class="fal fa-angle-left"></i></button>
                                <button type="button" class="vs4i_right_arrow"><i
                                        class="fal fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="vertical_slider_4item" data-slick='{"dots": false}'>

                            @foreach($productlatest as $latest)

                            <div class="slider_item">
                                <div class="small_product_layout">
                                    <a class="item_image" href="shop_details.html">
                                        <img src="{{ asset('backend/productImage/'.$latest->thumbnails)}}"
                                            alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="{{route('productdetails',$latest->product_slug)}}">{!!
                                                Str::limit($latest->product_name,14)!!}</a>
                                        </h3>
                                        <ul class="rating_star ul_li">
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </li>
                                        </ul>
                                        <div class="item_price">
                                            <span>${{$latest->discount_price}}</span>
                                            <del>${{$latest->product_price}}</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget product-add">
                        <div class="product-img">
                            <img src="{{ asset('frontend') }}/images/shop/product_img_10.png" alt>
                        </div>
                        <div class="details">
                            <h4>iPad pro</h4>
                            <p>iPad pro with M1 chipe</p>
                            <a class="btn btn_primary" href="#">Start Buying</a>
                        </div>
                    </div>
                    <div class="widget audio-widget">
                        <h5>Audio <span>5</span></h5>
                        <ul>
                            <li><a href="#">MI headphone</a></li>
                            <li><a href="#">Bluetooth AirPods</a></li>
                            <li><a href="#">Music system</a></li>
                            <li><a href="#">JBL bar 5.1</a></li>
                            <li><a href="#">Edifier Computer Speaker</a></li>
                            <li><a href="#">Macbook pro</a></li>
                            <li><a href="#">Mens watch</a></li>
                            <li><a href="#">Washing metchin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container  -->
</section>
<!-- products-with-sidebar-section - end -->


<!-- promotion_section - start -->
<section class="promotion_section">
    <div class="container">
        <div class="row promotion_banner_wrap">
            <div class="col col-lg-6">
                <div class="promotion_banner">
                    <div class="item_image">
                        <img src="{{ asset('frontend') }}/images/promotion/banner_img_1.png" alt>
                    </div>
                    <div class="item_content">
                        <h3 class="item_title">Protective sleeves <span>combo.</span></h3>
                        <p>It is a long established fact that a reader will be distracted</p>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6">
                <div class="promotion_banner">
                    <div class="item_image">
                        <img src="{{ asset('frontend') }}/images/promotion/banner_img_2.png" alt>
                    </div>
                    <div class="item_content">
                        <h3 class="item_title">Nutrillet blender <span>combo.</span></h3>
                        <p>
                            It is a long established fact that a reader will be distracted
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- promotion_section - end -->

<!-- new_arrivals_section - start -->
<section class="new_arrivals_section section_space">
    <div class="container">
        <div class="sec-title-link">
            <h3>New Arrivals</h3>
        </div>

        <div class="row newarrivals_products">
            <div class="col col-lg-5">
                <div class="deals_product_layout1">
                    <div class="bg_area">
                        <h3 class="item_title">Best <span>Product</span> Deals</h3>
                        <p>
                            Get a 20% Cashback when buying TWS Product From SoundPro Audio Technology.
                        </p>
                        <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="col col-lg-7">
                <div class="new-arrivals-grids clearfix">

                    @foreach($productlatest as $product)
                    <div class="grid">
                        <div class="product-pic">
                            <img src="{{ asset('backend/productImage/'.$product->thumbnails)}}" alt>
                            <div class="actions">
                                <ul>
                                    <li class="pro_iddhore">
                                        <a class="addtowishlist"><i class="far fa-heart"></i></a>
                                        <input type="hidden" class="pro_id" value="{{$product->id}}">
                                        </a>
                                    </li>
                                    <li>
                                        <a class="quickview_btn" data-bs-toggle="modal"
                                            href="#quickview_popup{{$product->id}}" role="button" tabindex="0"><svg
                                                width="48px" height="48px" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1"
                                                stroke-linecap="square" stroke-linejoin="miter" fill="none"
                                                color="#2329D6">
                                                <title>Visible (eye)</title>
                                                <path
                                                    d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="details">
                            <h4><a
                                    href="{{route('productdetails',$product->product_slug)}}">{{$product->product_name}}</a>
                            </h4>
                            <p><a href="{{route('productdetails',$product->product_slug)}}">{!!Str::limit($product->short_desc,50)!!}
                                </a></p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span
                                                class="woocommerce-Price-currencySymbol">$</span>{{$product->product_price}}</bdi>
                                    </span>
                                </ins>
                            </span>
                            <div class="add-cart-area">
                                <button id="product_id" value="{{ $product->id }}" class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- product quick view modal - start -->
                    <div class="modal fade" id="quickview_popup{{$product->id}}" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="product_details">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col col-lg-6">
                                                    <div class="product_details_image p-0">
                                                        <img src="{{ asset('backend/productImage/'.$product->thumbnails) }}"
                                                            alt>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="product_details_content">
                                                        <h2 class="item_title">{{$product->product_name}}</h2>
                                                        <p>
                                                            {!!Str::limit($product->short_desc,100) !!}
                                                        </p>
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
                                                            <span>${{$product->discount_price}}</span>
                                                            <del>${{$product->product_price}}</del>
                                                        </div>
                                                        <hr>

                                                        <div class="quantity_wrap">
                                                            <form action="#">
                                                                <div class="quantity_input">
                                                                    <button type="button" id="decrementbutton"
                                                                        class="input_number_decrement">
                                                                        <i class="fal fa-minus"></i>
                                                                    </button>
                                                                    <input class="input_number" id="orginalvalue"
                                                                        type="text" value="1">
                                                                    <button type="button" id="incrementbutton"
                                                                        class="input_number_increment">
                                                                        <i class="fal fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                            <div class="total_price">
                                                                Total: ${{$product->product_price}}
                                                            </div>
                                                        </div>

                                                        <ul class="default_btns_group ul_li">
                                                            <li><a class="addtocart_btn btniugyfuy" href="#!">Add To
                                                                    Cart</a></li>
                                                            <li><a href="#!"><i class="far fa-compress-alt"></i></a>
                                                            </li>
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
                    <!-- product quick view modal end -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new_arrivals_section - end -->

<!-- viewed_products_section - start -->
<section class="viewed_products_section section_space">
    <div class="container">

        <div class="sec-title-link mb-0">
            <h3>Recently Viewed Products</h3>
        </div>

        <div class="viewed_products_wrap arrows_topright">
            <div class="viewed_products_carousel row" data-slick='{"dots": false}'>
                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_1.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Electronics</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_2.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">PC & Laptop</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_3.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Tables & Mobiles</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_4.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Accessories</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_5.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">TV & Audio</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_6.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Games & Consoles</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_1.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Electronics</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_2.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">PC & Laptop</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_3.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Tables & Mobiles</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_4.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Accessories</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_5.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">TV & Audio</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{ asset('frontend') }}/images/viewed_products/viewed_product_img_6.png"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Games & Consoles</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_nav">
                <button type="button" class="vpc_left_arrow"><i class="fal fa-long-arrow-alt-left"></i></button>
                <button type="button" class="vpc_right_arrow"><i class="fal fa-long-arrow-alt-right"></i></button>
            </div>
        </div>
    </div>
    {{--  <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>  --}}
</section>
<!-- viewed_products_section - end -->
@endsection