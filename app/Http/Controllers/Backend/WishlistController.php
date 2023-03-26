<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Wishlist;
use App\Models\Backend\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // STORE WISHLIST
    public function storeWishlist(Request $request)
    {
        $wishcheck = Wishlist::where('user_id',Auth::id())->where('pro_id',$request->pro_iddfd)->first();
        if(Auth::check()){
            if($wishcheck != null){
                if(Wishlist::where('user_id',Auth::id())->where('pro_id',$request->pro_iddfd)->first()){
                    return response()->json([
                        'status'=>'logged',
                        'data'=>'ALREADY ADDED WISHLIST'
                    ]); 
                }
                else{
                    if(Product::find($request->pro_iddfd)){
                        $wish = new Wishlist();
                        $wish->pro_id = $request->pro_iddfd;
                        $wish->user_id = Auth::id();
                        $wish->save();
                        return response()->json([
                            'data'=>'SUCCESSFULLY ADDED WISHLIST'
                        ]);
                    }
                    else{
                        return response()->json([
                            'status'=>'logged',
                            'data'=>'Product Does Not Exist'
                        ]);
                    } 
                } //check else
            }else{
                if(Product::find($request->pro_iddfd)){
                    $wish = new Wishlist();
                    $wish->pro_id = $request->pro_iddfd;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json([
                        'data'=>'SUCCESSFULLY ADDED WISHLIST'
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>'logged',
                        'data'=>'Product Does Not Exist'
                    ]);
                } 
            } //null else
           
        }
        else{
            return response()->json([
                'status'=>'logged',
                'data'=>'Login To Continue'
            ]);
        }
    } //END METHOD
    public function addtowishlistforshop($id)
    {
        $wishcheck = Wishlist::where('user_id',Auth::id())->where('pro_id',$id)->first();
        if(Auth::check()){
            if($wishcheck != null){
                if(Wishlist::where('user_id',Auth::id())->where('pro_id',$id)->first()){
                    return response()->json([
                        'status'=>'logged',
                        'data'=>'ALREADY ADDED WISHLIST'
                    ]); 
                }
                else{
                    if(Product::find($id)){
                        $wish = new Wishlist();
                        $wish->pro_id = $id;
                        $wish->user_id = Auth::id();
                        $wish->save();
                        return response()->json([
                            'data'=>'SUCCESSFULLY ADDED WISHLIST'
                        ]);
                    }
                    else{
                        return response()->json([
                            'status'=>'logged',
                            'data'=>'Product Does Not Exist'
                        ]);
                    } 
                } //check else
            }else{
                if(Product::find($id)){
                    $wish = new Wishlist();
                    $wish->pro_id = $id;
                    $wish->user_id = Auth::id();
                    $wish->save();
                    return response()->json([
                        'data'=>'SUCCESSFULLY ADDED WISHLIST'
                    ]);
                }
                else{
                    return response()->json([
                        'status'=>'logged',
                        'data'=>'Product Does Not Exist'
                    ]);
                } 
            } //null else
           
        }
        else{
            return response()->json([
                'status'=>'logged',
                'data'=>'Login To Continue'
            ]);
        }
    } //END METHOD
    
    // SHOW WISHLIST BADGE
     public function showWishlist()
    {
        $wishlists = Wishlist::where('user_id',Auth::id())->get();
        return response()->json([
            'allitems'=> $wishlists
        ]);
    } //END METHOD
    
    // DELETE WISHLIST
        public function deletewishlist($id)
    {
        Wishlist::find($id)->delete();
        return back()->with('warning','SUCCESSFULLY REMOVED WISHLIST');
    } //END METHOD
    
    // WISHLISTPAGE done
    public function showWISHLISTblade()
    {
        $wishlists = Wishlist::where('user_id',Auth::id())->get();
        return view('frontend.pages.wishlist',compact('wishlists'));
    }
    
}
