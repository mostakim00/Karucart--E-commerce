@extends('frontend.master_template.template')
@section('body')
@section('title')
   Cart  | Details 
@endsection
    @if (count($carts) > 0)
        <!-- breadcrumb_section - start -->
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_nav ul_li">
                    <li><a href="#">Home</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end -->
        <!-- cart_section - start -->
        <section class="cart_section section_space">
            <div class="container">

                <div class="cart_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $key => $cart)
                                <tr>
                                    <form action="{{ route('web.cart.quantity.update') }}" method="POST"
                                        id="cartQtySubmit{{ $key }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="qtyrowId" name="qtyrowId" value="{{ $key }}">
                                        <td>
                                            <div class="cart_product">
                                                <img src="{{ asset('backend/productImage/' . $cart->options['image']) }}"
                                                    alt="image_not_found">
                                                <h3><a href="#">{{ $cart->name }}</a></h3>
                                            </div>
                                        </td>
                                        <td class="text-center"><span class="price_text">${{ $cart->price }}</span></td>
                                        <td class="text-center">
                                            <div class="quantity_input">
                                                <button type="button" class="input_number_decrement"
                                                    value="{{ $key }}">
                                                    <i class="fal fa-minus"></i>
                                                </button>
                                                <input name="cart_quantity" id="quantity{{ $key }}"
                                                    class="input_number" type="number" value="{{ $cart->qty }}"
                                                    min="1" />
                                                <button type="button" class="input_number_increment"
                                                    value="{{ $key }}">
                                                    <i class="fal fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="text-center"><span
                                                class="price_text">${{ $cart->price * $cart->qty }}</span>
                                        </td>
                                        <td class="text-center">
                                            <button type="submit" class="sync_btn" style="margin-right: 30px;"
                                                title="Update">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>

                                            <button title="Delete" value="{{ $key }}" id="cartProductRemove"
                                                type="button" class="remove_btn">
                                                <i class="fal fa-trash-alt"></i></button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="cart_btns_wrap">
                    <div class="row">
                        @if (!Session::has('coupon'))
                            <div class="col col-lg-6">
                                <form action="{{ route('web.coupon.apply') }}" method="POST">
                                    @csrf
                                    <div class="coupon_form form_item mb-0">
                                        <input class=" @error('coupon') is-invalid @enderror" type="text" name="coupon"
                                            placeholder="Coupon Code...">
                                        <button type="submit" class="btn btn_dark">Apply Coupon</button>
                                        <div class="info_icon">
                                            <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Your Info Here"></i>
                                        </div>
                                    </div>
                                    @error('coupon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </form>
                            </div>
                        @else
                            <div class="col col-lg-6"></div>
                        @endif


                        <div class="col col-lg-6">
                            <ul class="btns_group ul_li_right">
                                <li><a class="btn btn_dark" href="{{ route('example2') }}">Prceed To Checkout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-lg-6"></div>
                    <div class="col col-lg-6">
                        <div class="cart_total_table">
                            <h3 class="wrap_title">Cart Totals</h3>
                            <ul class="ul_li_block">
                                <li>
                                    <span>Cart Subtotal</span>
                                    <span>${{ Cart::subtotal() }}</span>
                                </li>
                                @if (Session::has('coupon'))
                                    <li>
                                        <span>Coupon</span>
                                        <span>${{ Session::get('coupon')['discount'] }}
                                            <a title="Coupon Remove" style="padding-left: 20px;"
                                                href="{{ route('web.coupon.remove') }}" class="text-danger"><i
                                                    class="fas fa-backspace"></i></a>
                                        </span>
                                    </li>
                                    <li>
                                        <span>Order Total</span>
                                        <span class="total_price">${{ Session::get('coupon')['balance'] }}</span>
                                    </li>
                                @else
                                    <li>
                                        <span>Order Total</span>
                                        <span class="total_price">${{ Cart::subtotal() }}</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cart_section end -->
    @else
        <!-- breadcrumb_section - start -->
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_nav ul_li">
                    <li><a href="{{ route('web.home') }}">Home</a></li>
                    <li>Empty Cart</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb_section - end -->

        <!-- empty_cart_section - start -->
        <section class="empty_cart_section section_space">
            <div class="container">
                <div class="empty_cart_content text-center">
                    <span class="cart_icon">
                        <i class="icon icon-ShoppingCart"></i>
                    </span>
                    <h3>There are no more items in your cart</h3>
                    <a class="btn btn_secondary" href="{{ route('web.home') }}"><i class="far fa-chevron-left"></i>
                        Continue shopping </a>
                </div>
            </div>
        </section>
        <!-- empty_cart_section - end -->
    @endif
@endsection
