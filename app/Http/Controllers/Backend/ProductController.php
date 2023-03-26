<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\SubCategory;
use App\Models\Backend\Product;
use App\Models\Backend\ProductGallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategory = SubCategory::all();
        $category = Category::all();
        $products = Product::with('category', 'vendor', 'subcategory')->latest()->where('created_by',Auth::user()->id)->get();
        return view('backend.pages.product.index', compact('products', 'subCategory', 'category'));
    } //end method

    public function PendingProduct(){
        $subCategory = SubCategory::select('id')->get();
        $category = Category::select('id')->get();
        $products = Product::with('category', 'vendor', 'subcategory')->latest()->whereIn('status',['0','1'])->get();
        return view('backend.pages.product.pendingproduct', compact('products','subCategory','category')); 
    } //end method

    public function ApprovedProduct($id){
        $findproduct = Product::findOrFail($id)->update(['status' => '1']);
        return back()->with('info','SUCCESSFULLY APPROVED');
    } //end method

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('backend.pages.product.create', compact('categories', 'subcategories'));
    } //END METHOD

    public function searchcategory(Request $request)
    {
        $cat_id = $request->cat_id;
        $subcategory = SubCategory::where('category_id', $cat_id)->get();
        // return Response::json($subcategory);
        return [
            'subcategorygggg' => $subcategory
        ];
    } //END METHOD

    public function searchcategoryforedit($id)
    {
        $subcategory = SubCategory::where('category_id', $id)->get();
        // return Response::json($subcategory);
        return [
            'subcategoryggggggd' => $subcategory
        ];
    } //END METHOD

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|unique:products',
            'product_name' => 'required',
            'product_price' => 'required',
            'discount_price' => 'required',
            'quantity' => 'required',
            'cat_id' => 'required',
            'subcat_id' => 'required',
            'thumbnails' => 'required|image|mimes:jpg,jpeg,png,giff,gif|max:600',
            'short_desc' => 'required',
            'long_desc' => 'required',
        ]);


        if ($request->thumbnails) {
            $productImage = $request->File('thumbnails');
            $productName = rand() . '.' . $productImage->getClientOriginalExtension();
            $productPath = public_path('backend/productImage/' . $productName);
            Image::make($productImage)->save($productPath);

            $product = new Product();
            $product->vendor_id = Auth::id();
            $product->product_code =  $request->product_code;
            $product->product_name = $request->product_name;
            $product->product_slug = Str::slug($request->product_name);
            $product->product_price = $request->product_price;
            $product->discount_price = $request->discount_price;
            $product->quantity = $request->quantity;
            $product->cat_id = $request->cat_id;
            $product->subcat_id = $request->subcat_id;
            $product->status = '0';
            $product->short_desc = $request->short_desc;
            $product->long_desc = $request->long_desc;
            $product->created_by = Auth::user()->id;
            $product->created_at = Carbon::now();
            $product->thumbnails = $productName;
            $product->save();
        }

        if ($request->images) {
            $galleryimages = $request->file('images');
            foreach ($galleryimages as $galleryimage) {
                $customName = rand() . '.' . $galleryimage->getClientOriginalExtension();
                $location = public_path('backend/productImage/product_galleries/') . $customName;
                Image::make($galleryimage)->save($location);

                $gallery = new ProductGallery();
                $gallery->product_code = $request->product_code;
                $gallery->images = $customName;
                $gallery->save();
            }
        }
        return redirect()->route('manage.products')->with('message', 'SUCCESSFULLY PRODUCT IINSERTED');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array();
        $data['product'] = Product::with('vendor')->find($id);
        $data['category'] = Category::all();
        $data['subcategory'] = SubCategory::where('id', $data['product']->subcat_id)->first();
        if ($data['product'] != null) {
            $data['galleryimages'] = ProductGallery::where('product_code', $data['product']->product_code)->get();
        } else {
            return back();
        }
        return view('backend.pages.product.edit', $data);
    }
    public function PendingEdit($id)
    {
        $data = array();
        $data['product'] = Product::with('vendor')->find($id);
        $data['category'] = Category::all();
        $data['subcategory'] = SubCategory::where('id', $data['product']->subcat_id)->first();
        if ($data['product'] != null) {
            $data['galleryimages'] = ProductGallery::where('product_code', $data['product']->product_code)->get();
        } else {
            return back();
        }
        return view('backend.pages.product.pendingedit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->product_price = $request->product_price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->status = '0';
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->updated_by = Auth::user()->id;
        $product->updated_at = Carbon::now();

        if ($request->thumbnails) {
            if (File::exists('backend/productImage/' . $product->thumbnails)) {
                File::delete('backend/productImage/' . $product->thumbnails);
            }
            $productImage = $request->File('thumbnails');
            $productName = rand() . '.' . $productImage->getClientOriginalExtension();
            $productPath = public_path('backend/productImage/' . $productName);
            Image::make($productImage)->save($productPath);
            $product->thumbnails = $productName;
        }

        if (!empty($request->images)) {
            $galleryimages = $request->file('images');
            foreach ($galleryimages as $galleryimage) {
                $customName = rand() . '.' . $galleryimage->getClientOriginalExtension();
                $location = public_path('backend/productImage/product_galleries/') . $customName;
                Image::make($galleryimage)->save($location);

                $gallery = new ProductGallery();
                $gallery->product_code = $request->product_code;
                $gallery->images = $customName;
                $gallery->save();
            }
        }
        $product->update();
        return redirect()->route('manage.products')->with('info', 'SUCCESSFULLY PRODUCT UPDATED');
    } //endmethod

     public function PendingUpdate(Request $request,$id){
        $product = Product::findOrFail($id);
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->product_price = $request->product_price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->status = '0';
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->updated_by = Auth::user()->id;
        $product->updated_at = Carbon::now();

        if ($request->thumbnails) {
            if (File::exists('backend/productImage/' . $product->thumbnails)) {
                File::delete('backend/productImage/' . $product->thumbnails);
            }
            $productImage = $request->File('thumbnails');
            $productName = rand() . '.' . $productImage->getClientOriginalExtension();
            $productPath = public_path('backend/productImage/' . $productName);
            Image::make($productImage)->save($productPath);
            $product->thumbnails = $productName;
        }

        if (!empty($request->images)) {
            $galleryimages = $request->file('images');
            foreach ($galleryimages as $galleryimage) {
                $customName = rand() . '.' . $galleryimage->getClientOriginalExtension();
                $location = public_path('backend/productImage/product_galleries/') . $customName;
                Image::make($galleryimage)->save($location);

                $gallery = new ProductGallery();
                $gallery->product_code = $request->product_code;
                $gallery->images = $customName;
                $gallery->save();
            }
        }
        $product->update();
        return redirect()->route('manage.products.pending')->with('info', 'SUCCESSFULLY PRODUCT UPDATED');
     } //end method
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (File::exists('backend/productImage/' . $product->thumbnails)) {
            File::delete('backend/productImage/' . $product->thumbnails);
        }

        $productGalleries = ProductGallery::where('product_code', $product->product_code)->get();
        foreach ($productGalleries as $productGallery) {
            if (File::exists('backend/productImage/product_galleries/' . $productGallery->images)) {
                File::delete('backend/productImage/product_galleries/' . $productGallery->images);
            }

            $productgalleryData = ProductGallery::find($productGallery->id);
            $productgalleryData->delete();
        }

        $product->delete();
        return back()->with('warning', 'SUCCESSFULLY PRODUCT DELETED');
    }

    public function singleimagedestroy($id)
    {
        $gallery = ProductGallery::find($id);
        File::delete('backend/productImage/product_galleries/' . $gallery->images);
        $gallery->delete();
        return back()->with('success', 'Gallery Image Deleted');
    }

    public function dsinglepimageajax($id)
    {
        $gallery = ProductGallery::find($id);
        File::delete('backend/productImage/product_galleries/' . $gallery->images);
        $gallery->delete();
        return response()->json([
            'warning' => 'success'
        ]);
    }
}
