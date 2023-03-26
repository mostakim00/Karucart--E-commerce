<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Coupon;
use App\Models\Backend\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use League\OAuth1\Client\Server\Tumblr;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();
        return view('frontend.pages.cart', compact('carts'));
    }
    public function addToCart($id)
    {
        $carts = Cart::content();
        foreach ($carts as $cart) {
            if ($cart->id == $id) {
                return response()->json([
                    'warning' => "Product Already Added!",
                    'cart_count' => Cart::count(),
                    'carts' => Cart::content(),
                    'cart_total' => Cart::subtotal(),
                ]);
            }
        }
        $product = Product::where('id', $id)->first();
        if ($product->discount_price == NULL) {
            Cart::add(
                [
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => 1,
                    'price' => $product->product_price,
                    'weight' => 1,
                    'options' => ['image' => $product->thumbnails]
                ]);
        } else {
            Cart::add(
                [
                    'id' => $product->id,
                    'name' => $product->product_name,
                    'qty' => 1,
                    'price' => $product->discount_price,
                    'weight' => 1,
                    'options' => ['image' => $product->thumbnails]
                ]);
        }
        return response()->json([
            'message' => "Product Add To Cart",
            'cart_count' => Cart::count(),
            'carts' => Cart::content(),
            'cart_total' => Cart::subtotal(),
        ]);
    }
    // Get All Cart
    public function allCart()
    {
        $carts = Cart::content();
        // $carts = Cart::destroy();
        return response()->json([
            'cart' => $carts,
            // 'message' => "Delete",
        ]);
    }
    // Right Bar Cart Product Remove
    public function singleRemove($rowId)
    {
        Cart::remove($rowId);
        return response()->json([
            'message' => "Product Remove From Cart",
            'cart_count' => Cart::count(),
            'carts' => Cart::content(),
            'cart_total' => Cart::subtotal(),
        ]);
    }
    // Cart Product Remove
    public function cartProductRemove($rowId)
    {
        Cart::remove($rowId);
        return response()->json([
            'message' => "Product Remove From Cart",
        ]);
    }
    public function cartQtyUpdate(Request $request)
    {
        $request->validate([
            'cart_quantity' => 'required|min:1'
        ]);
        $quantity = $request->cart_quantity;
        if ($quantity <= -1 || $quantity == 0 || $quantity == '') {
            return redirect()->back()->with('error','Quantity Minimum 1');
        }else{
            Cart::update($request->qtyrowId, ['qty' => $request->cart_quantity]);
            Session::forget('coupon');
            return redirect()->back()->with('message','Product Quantity Updated');
        }
    }
    public function couponApply(Request $request)
    {
        $request->validate([
            'coupon' => 'required|  |max:255'
        ]);
        $coupon = Coupon::where('coupon_code', $request->coupon)->first();
        if ($coupon) {
            $check = Coupon::where('coupon_code', $request->coupon)->whereBetween('created_at', [$coupon->start_at, $coupon->end_at])->first();
            // dd($check);
            if ($check) {
                Session::put('coupon', [
                    'name' => $check->coupon_code,
                    'discount' => $check->discount_amount,
                    'balance' => Cart::Subtotal() - ($check->discount_amount)
                ]);
                return redirect()->back()->with('message','Coupon Added!');
            }else{
                return redirect()->back()->with('error','Coupon Was Expire');
            }
        }else{
            return redirect()->back()->with('error','Coupon Not Found !');
        }
    }

    public function couponRemove(){
        Session::forget('coupon');
        return redirect()->back()->with('message','Coupon Removed Successfully');
    }

    public function checkOut(){
        return view('frontend.pages.checkout');
    }
}
