<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\WishlistController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\VendormessageController;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ----------------------------------------------------------------------
// <======================= SOCIAL LOGIN ROUTE LIST ===========================>
// ----------------------------------------------------------------------

//for Google
Route::get('/gotogoogle', [SocialLoginController::class, 'gotogoogle'])->name('gotogoogle');
Route::get('/google/login', [SocialLoginController::class, 'googleUserInfo'])->name('googleUserInfo');

//for Facebook
Route::get('/gotofacebook', [SocialLoginController::class, 'gotofacebook'])->name('gotofacebook');
Route::get('/facebook/login', [SocialLoginController::class, 'facebookUserInfo'])->name('facebookUserInfo');

// SSLCOMMERZ Start
Route::get('/Payment', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->middleware(['auth'])->name('examplecheckout1');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('example2');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// ----------------------------------------------------------------------
// <======================= FRONTEND ROUTE LIST ===========================>
// ----------------------------------------------------------------------
Route::get('/', [FrontendController::class, 'index'])->name('web.home');
Route::get('/productdetails/{product_slug}', [FrontendController::class, 'productdetails'])->name('productdetails');

Route::get('/user/logout', [FrontendController::class, 'userLogout'])->name('user.logout');
Route::get('/account', [FrontendController::class, 'account'])->name('user.account')->middleware('auth');

// <----------------- WISH LIST ROUTE LIST ---------------->
Route::get('/wishlist', [WishlistController::class, 'showWISHLISTblade'])->name('wishlistshowpage');
Route::post('/addtowishlist', [WishlistController::class, 'storeWishlist']);
Route::get('/forshowwishlist', [WishlistController::class, 'showWishlist']);
Route::get('/fordeletewishlist/{id}', [WishlistController::class, 'deletewishlist'])->name('deletewishlistproduct');
Route::get('/addtowishlistforshop/{id}', [WishlistController::class, 'addtowishlistforshop']);


Route::get('/userregister', function () {
    return view('frontend.pages.user.register');
});
//message
Route::get('/message', function () {
    return view('frontend.pages.message');
});
Route::get('/404', function () {
    return view('frontend.pages.404');
});

//-------search product----------
Route::get('/search', [FrontendController::class, 'searchProduct'])->name('search');
Route::get('/contact', [FrontendController::class, 'ContactPage'])->name('web.contact');
Route::get('/aboutus', [FrontendController::class, 'AboutUsPage'])->name('web.aboutus');

//----shope----||category wise product show
Route::get('/shop/{id}', [FrontendController::class, 'categoryWiseProduct'])->name('catProduct');

//newslatter store||subscribe
Route::post('/newslatter/store', [FrontendController::class, 'newslatterstore']);

Route::get('/blank', function () {
    return view('backend.masterTemplate._blankPage');
})->name('blank');

// <==========ADD TO CART ROUTE LIST ==========>
Route::get('/allcart', [CartController::class, 'allCart'])->name('web.allCart');
Route::get('/addtocart/{id}', [CartController::class, 'addToCart'])->name('web.addtocart');
Route::get('/cart', [CartController::class, 'index'])->middleware(['auth'])->name('web.cart.index');
Route::get('/cart/remove/{rowId}', [CartController::class, 'singleRemove'])->name('web.cart.single.remove');
Route::get('/cart/product/remove/{rowId}', [CartController::class, 'cartProductRemove'])->name('web.cart.product.remove');
Route::put('/cart/product/update', [CartController::class, 'cartQtyUpdate'])->name('web.cart.quantity.update');
Route::post('/cart/coupon/apply', [CartController::class, 'couponApply'])->name('web.coupon.apply');
Route::get('/cart/coupon/remove', [CartController::class, 'couponRemove'])->name('web.coupon.remove');
// Checkout Route
Route::get('/checkout', [CartController::class, 'checkOut'])->middleware(['auth'])->name('web.checkout');
Route::post('/payment/step', [PaymentController::class, 'paymentStep'])->middleware(['auth'])->name('web.payment.step');


// <==========VENDOR MESSAGE ROUTE LIST ==========>
Route::group(['prefix' => 'vendorMessage'], function () {
    Route::post('/index', [VendormessageController::class, 'index'])->name('index.VendorMessage');
    Route::post('/store', [VendormessageController::class, 'store'])->name('store.VendorMessage');
    Route::get('/show/user/{id}', [VendormessageController::class, 'showuser'])->name('show.UserMessage');
    Route::get('/show/allMessage', [VendormessageController::class, 'allMessage'])->name('show.allMessage');
    Route::get('/showsidebarMessage', [VendormessageController::class, 'showsidebarMessage'])->name('show.sidebarMessage');
    Route::get('/show/userMessages/{id}', [VendormessageController::class, 'userMessages'])->name('show.userMessages');
    Route::get('/show/vendormessage/{id}', [VendormessageController::class, 'vendorMessages'])->name('show.vendorMessages');
});


// ----------------------------------------------------------------------
// <======================= ADMIN ROUTE LIST ===========================>
// ----------------------------------------------------------------------

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

    // <======================= USER ROUTE LIST ===========================>
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/insert', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('delete/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
        // User Password Changes

        Route::post('user/password/change', [UserController::class, 'passwordChange'])->name('admin.user.password.change');
    });

    // <======================= CUSTOMER ROUTE LIST ===========================>
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('admin.customer.index');
        Route::get('add', [CustomerController::class, 'create'])->name('admin.customer.create');
        Route::post('add', [CustomerController::class, 'store'])->name('admin.customer.store');
        Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
        Route::put('update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
        Route::get('delete/{id}', [CustomerController::class, 'destroy'])->name('admin.customer.destroy');

        // Customer Password Changes
        Route::post('password/change', [CustomerController::class, 'passwordChange'])->name('admin.customer.password.change');
    });

    // <======================= USER ROLE ROUTE LIST ===========================>
    Route::group(['prefix' => 'role', 'middleware' => 'superadmin'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
        Route::post('/', [RoleController::class, 'store'])->name('admin.role.store');
        Route::put('/{id}', [RoleController::class, 'update'])->name('admin.role.update');
        Route::get('delete/{id}', [RoleController::class, 'destroy'])->name('admin.role.destroy');
    });

    // <======================= PRODUCT ROUTE LIST ===========================>

    Route::group(['prefix' => 'product'], function () {
        Route::get('/create', [ProductController::class, 'create'])->name('add.products');
        Route::get('/manage', [ProductController::class, 'index'])->name('manage.products');
        Route::get('/pending', [ProductController::class, 'PendingProduct'])->name('manage.products.pending');
        Route::get('/approve/{id}', [ProductController::class, 'ApprovedProduct'])->name('pending.approved');
        Route::get('/pending/edit/{id}', [ProductController::class, 'PendingEdit'])->name('product.pending.edit');
        Route::POST('/pending/update//{id}', [ProductController::class, 'PendingUpdate'])->name('product.pending.update');
        Route::POST('/insert', [ProductController::class, 'store'])->name('product.insert');
        Route::GET('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::POST('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::GET('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::GET('singleimage/delete/{id}', [ProductController::class, 'singleimagedestroy'])->name('singleimage.delete');
        Route::GET('/delete/singleproduct/imageajax/{id}', [ProductController::class, 'dsinglepimageajax']);
        // CATEGORY SUB CATEGORY SEARCH ROUTE
        Route::GET('/searchcategory', [ProductController::class, 'searchcategory']);
        Route::GET('/searchcategoryforedit/{id}', [ProductController::class, 'searchcategoryforedit']);
    });

    //<======================= SLIDER ROUTE LIST ===========================>
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/create', [SliderController::class, 'create'])->name('createSlider');
        Route::get('/productDetailesShow/{id}', [SliderController::class, 'productDetailesShow'])->name('productDetailesShow');
        Route::get('/manage', [SliderController::class, 'index'])->name('manageSlider');
        Route::POST('/insert', [SliderController::class, 'store'])->name('storeSlider');
        Route::GET('/edit/{id}', [SliderController::class, 'edit']);
        Route::POST('/update/{id}', [SliderController::class, 'update'])->name('updateSlider');
        Route::GET('/delete/{id}', [SliderController::class, 'destroy'])->name('deleteSlider');
    });
    // <======================= CATEGORY ROUTE LIST  ===========================>

    Route::group(['prefix' => 'category'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->name('category.manage');
        Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->name('category.store');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\CategoryController@destroy')->name('category.delete');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\CategoryController@update');
    });
    // <======================= SUB-CATEGORY ROUTE LIST ===========================>

    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/manage', 'App\Http\Controllers\Backend\SubCategoryController@index')->name('subcategory.index');
        Route::post('/store', 'App\Http\Controllers\Backend\SubCategoryController@store')->name('subcategory.store');
        Route::get('/delete/{id}', 'App\Http\Controllers\Backend\SubCategoryController@destroy')->name('subcategory.delete');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\SubCategoryController@edit')->name('subcategory.edit');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\SubCategoryController@update')->name('subcategory.update');
    });
    // <======================= COUPON ROUTE LIST ===========================>
    Route::group(['prefix' => 'coupon'], function () {
        Route::get('/create', [CouponController::class, 'create'])->name('admin.coupon.create');
        Route::get('/manage', [CouponController::class, 'index'])->name('admin.coupon.manage');
        Route::post('/add', [CouponController::class, 'store'])->name('admin.coupon.add');
        Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('admin.coupon.edit');
        Route::post('/update/{id}', [CouponController::class, 'update'])->name('admin.coupon.update');
        Route::get('/delete/{id}', [CouponController::class, 'destroy'])->name('admin.coupon.delete');
    });
    // <======================= SETTING ROUTE LIST ===========================>
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/create', [SettingController::class, 'create'])->name('setting');
        Route::post('/update', [SettingController::class, 'update'])->name('settingup');
    });

    // <======================= PROFILE ROUTE LIST ===========================>
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [SettingController::class, 'profileEdit'])->name('admin.profile');
        Route::post('/{id}', [SettingController::class, 'profileUpdate'])->name('admin.profile.update');
        Route::post('/password/{id}', [SettingController::class, 'profilePasswordUpdate'])->name('admin.profile.password.update');
        Route::post('/paymentinfo/{id}', [SettingController::class, 'profilePaymentUpdate'])->name('admin.profile.payment.update');
        Route::post('/image/{id}', [SettingController::class, 'profileImageUpdate'])->name('admin.profile.image.update');
    });
});

// Route::get('/dashboard', function () {
//     return view('backend.dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
