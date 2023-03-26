@extends('frontend.master_template.template')
@section('body')
@section('title')
   {{$product->product_name}} | Details 
@endsection
    <!-- breadcrumb_section - start
                ================================================== -->
    <div class="breadcrumb_section">
        <div class="container">
            <ul class="breadcrumb_nav ul_li">
                <li><a href="index.html">Home</a></li>
                <li>Product Details</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb_section - end
                ================================================== -->
    <!-- product_details - start
                ================================================== -->
    <section class="product_details section_space pb-0">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6">
                    <div class="product_details_image">
                        <div class="details_image_carousel">
                            <div class="slider_item">
                                <img src="{{asset('backend/productImage/'.$product->thumbnails)}}" alt="image_not_found">
                            </div>
                           @foreach($progallery as $gallery) 
                            <div class="slider_item">
                                <img src="{{asset('backend/productImage/product_galleries/'.$gallery->images)}}" alt="image_not_found">
                            </div>
                            @endforeach
                        </div>

                        <div class="details_image_carousel_nav">
                            <div class="slider_item">
                                <img src="{{asset('backend/productImage/'.$product->thumbnails)}}" alt="image_not_found">
                            </div>
                            @foreach($progallery as $gallery) 
                            <div class="slider_item">
                                <img src="{{asset('backend/productImage/product_galleries/'.$gallery->images)}}" alt="image_not_found">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="product_details_content">
                        <h2 class="item_title">{{$product->product_name}}</h2>
                        <p>{{$product->short_desc}}</p>
                        <div class="item_review">
                            <ul class="rating_star ul_li">
                                <li><i class="fas fa-star"></i>></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star-half-alt"></i></li>
                            </ul>
                            <span class="review_value">3 Rating(s)</span>
                        </div>

                        <div class="item_price">
                            <span>${{$product->discount_price}}</span>
                            <del>${{$product->product_price}}</del>
                        </div>
                        <hr>

                        <div class="quantity_wrap">
                            <div class="quantity_input">
                                <button type="button" class="input_number_decrement">
                                    <i class="fal fa-minus"></i>
                                </button>
                                <input class="input_number" type="text" value="1">
                                <button type="button" class="input_number_increment">
                                    <i class="fal fa-plus"></i>
                                </button>
                            </div>
                            <div class="total_price">Total: ${{$product->discount_price}}</div>
                        </div>

                        <ul class="default_btns_group ul_li">
                            <li>
                               <button id="product_id" value="{{ $product->id }}" class="btn btn_primary addtocart_btn">Add to cart</button>
                            </li>
                            <li>
                                <div class="message-to-vendor">
                                    <form action="{{ route('index.VendorMessage') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="vendor_id" value="{{ $product->vendor_id }}">
                                        @auth
                                            <button class="message-to-vendor">Contact Vendor</button>
                                        @else
                                            <a class="message-to-vendor" href="{{ route('login') }}">Contact
                                                Vendor</a>
                                        @endauth
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    </form>
                </div>
            </div>
            <div class="details_information_tab">
                <ul class="tabs_nav nav ul_li" role=tablist>
                    <li>
                        <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button"
                            role="tab" aria-controls="description_tab" aria-selected="true">
                            Description
                        </button>
                    </li>
                    <li>
                        <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab"
                            aria-controls="reviews_tab" aria-selected="false">
                            Reviews(2)
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                        <p{!! $product->long_desc !!}</p>
                    </div>
                    <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                        <div class="average_area">
                            <div class="row align-items-center">
                                <div class="col-md-12 order-last">
                                    <div class="average_rating_text">
                                        <ul class="rating_star ul_li_center">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <p class="mb-0">
                                            Average Star Rating: <span>4 out of 5</span> (2 vote)
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="customer_reviews">
                            <h4 class="reviews_tab_title">2 reviews for this product</h4>
                            <div class="customer_review_item clearfix">
                                <div class="customer_image">
                                    <img src="assets/images/team/team_1.jpg" alt="image_not_found">
                                </div>
                                <div class="customer_content">
                                    <div class="customer_info">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                        <h4 class="customer_name">Aonathor troet</h4>
                                        <span class="comment_date">JUNE 2, 2021</span>
                                    </div>
                                    <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                                </div>
                            </div>

                            <div class="customer_review_item clearfix">
                                <div class="customer_image">
                                    <img src="assets/images/team/team_2.jpg" alt="image_not_found">
                                </div>
                                <div class="customer_content">
                                    <div class="customer_info">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                        <h4 class="customer_name">Danial obrain</h4>
                                        <span class="comment_date">JUNE 2, 2021</span>
                                    </div>
                                    <p class="mb-0">
                                        Great product quality, Great Design and Great Service.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="customer_review_form">
                            <h4 class="reviews_tab_title">Add a review</h4>
                            <form action="#">
                                <div class="form_item">
                                    <input type="text" name="name" placeholder="Your name*">
                                </div>
                                <div class="form_item">
                                    <input type="email" name="email" placeholder="Your Email*">
                                </div>
                                <div class="your_ratings">
                                    <h5>Your Ratings:</h5>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                    <button type="button"><i class="fal fa-star"></i></button>
                                </div>
                                <div class="form_item">
                                    <textarea name="comment" placeholder="Your Review*"></textarea>
                                </div>
                                <button type="submit" class="btn btn_primary">Submit Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_details - end
                ================================================== -->

    <!-- related_products_section - start
                ================================================== -->
    <section class="related_products_section section_space">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="best-selling-products related-product-area">
                        <div class="sec-title-link">
                            <h3>Related products</h3>
                            <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="product-area clearfix">
                            
                            @foreach($relatedproduct as $product)
                            <div class="grid">
                                <div class="product-pic">
                                    <img src="{{ asset('backend/productImage/'.$product->thumbnails)}}" alt>
                                    <div class="actions">
                                    <ul>
                                        <li class="pro_iddhorewishlist">
                                            <a class="addtowishlistsidecategorywise"><i class="far fa-heart"></i></a>
                                              <input type="hidden" class="pro_idsidecategory" value="{{$product->id}}">
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
                                    <h4><a href="{{route('productdetails',$product->product_slug)}}">{{$product->product_name}}</a></h4>
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
                                                    <span class="woocommerce-Price-currencySymbol">$</span>{{$product->product_price}}</bdi>
                                            </span>
                                        </ins>
                                    </span>
                                    <div class="add-cart-area">
                                        <button id="product_id" value="{{$product->id}}"  class="add-to-cart">Add to cart</button>
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
                                                <img src="{{ asset('backend/productImage/'.$product->thumbnails) }}" alt>
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
                                                            <button type="button" id="decrementbutton" class="input_number_decrement">
                                                                <i class="fal fa-minus"></i>
                                                            </button>
                                                            <input class="input_number" id="orginalvalue" type="text" value="1">
                                                            <button type="button" id="incrementbutton" class="input_number_increment">
                                                                <i class="fal fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <div class="total_price">
                                                        Total: ${{$product->product_price}}
                                                    </div>
                                                </div>

                                                <ul class="default_btns_group ul_li">
                                                    <li><a class="addtocart_btn btniugyfuy" href="#!">Add To Cart</a></li>
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
                </div>
            </div>
        </div>
    </section>
    <!-- related_products_section - end
                ================================================== -->
@endsection
