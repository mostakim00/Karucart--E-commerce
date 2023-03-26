@php
    $carts = Cart::content();
@endphp
<!-- sidebar cart - start -->
<div class="sidebar-menu-wrapper">
    <div class="cart_sidebar">
        <button type="button" class="close_btn"><i class="fal fa-times"></i></button>
        <ul class="cart_items_list ul_li_block mb_30 clearfix" id="cart_item">
            @if (count($carts) > 0)
                @foreach ($carts as $cart)
                <li>
                    <div class="item_image">
                        <img src="{{ asset('backend/productImage/'.$cart->options->image)}}" alt="image_not_found">
                    </div>
                    <div class="item_content">
                        <h4 class="item_title">{{ $cart->name }}</h4>
                        <span class="item_price">${{ $cart->price }}</span>
                    </div>
                    <button id="cartRemove" value="{{ $cart->rowId }}" type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                </li>
                @endforeach
            @else
                <li>
                    <h4>Cart Is Empty</h4>
                </li>
            @endif

        </ul>

        <ul class="total_price ul_li_block mb_30 clearfix">
            <li>
                <span>Total:</span>
                <span id="side_cart_total">${{ Cart::subtotal() }}</span>
            </li>
        </ul>

        <ul class="btns_group ul_li_block clearfix">
            <li><a class="btn btn_primary" href="{{ route('web.cart.index') }}">View Cart</a></li>
            <li><a class="btn btn_secondary" href="{{route('examplecheckout1')}}">Checkout</a></li>
        </ul>
    </div>

    <div class="cart_overlay"></div>
</div>
<!-- sidebar cart - end -->
