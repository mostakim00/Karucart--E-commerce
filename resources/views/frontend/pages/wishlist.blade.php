@extends('frontend.master_template.template')
@section('body')
@section('title')
    Wishlist || Details
@endsection
<!-- breadcrumb_section - start -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>Wishlist</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end -->

<!-- cart_section - start -->
<section class="cart_section section_space">
    <div class="container">
        <div class="cart_table">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>PRODUCT</th>
                        <th class="text-center">PRICE</th>
                        <th class="text-center">STOCK STATUS</th>
                        <th class="text-center">ADD TO CART</th>
                        <th class="text-center">REMOVE</th>
                    </tr>
                </thead>
                <tbody>
                    @if($wishlists->count() > 0)
                    @foreach($wishlists as $wi)
                    <tr>
                        <td>
                            <div class="cart_product">
                                <img src="{{asset('backend/productImage/'.$wi->product->thumbnails)}}"
                                    alt="image_not_found" />
                                <h3>{{Str::limit($wi->pro_name,20)}}</h3>
                            </div>
                        </td>
                        <td class="text-center"><span class="price_text">${{$wi->product->product_price}}</span></td>
                        <td class="text-center">
                            @if($wi->product->quantity > 0 )
                            <span class="price_text text-success">In Stock</span>
                            @else
                            <span class="price_text text-danger">Out of Stock</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="#!" class="btn btn_primary">Add To Cart</a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('deletewishlistproduct',$wi->id)}}" class="remove_btn"><i
                                    class="fal fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <h4 class="text-center">THERE ARE NO WISHLIST PRODUCTS ADDED</h4>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- cart_section - end -->
@endsection