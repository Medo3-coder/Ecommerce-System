<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\ShippingDistrictController;

use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\backend\SubSubCategoryController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\Backend\ShippingStateController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\WishlistController;
use Illuminate\Support\Facades\Route;

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






//admin route

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:admin'])->group(function () {

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // Admin All Routes
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/change/password', [AdminProfileController::class, 'adminProfilepassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'adminUpdateChangePassword'])->name('update.change.password');
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
});



//user all routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('User_dashboard');

Route::get('/', [IndexController::class, 'index']);

Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');

Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');

Route::get('/user/change/password', [IndexController::class, 'userChangePassword'])->name('change.password');

Route::post('/user/pasword/update', [IndexController::class, 'userPasswordUpdate'])->name('user.password.update');


// Admin Brand All Routes

Route::prefix('admin/brand')->group(function () {

    Route::get('/view', [BrandController::class, 'brandView'])->name('all.brand')->middleware('auth:admin');

    Route::post('/store', [BrandController::class, 'brandStore'])->name('brand.store')->middleware('auth:admin');

    Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit')->middleware('auth:admin');

    Route::post('/update/{id}', [BrandController::class, 'brandUpdate'])->name('brand.update')->middleware('auth:admin');

    Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete')->middleware('auth:admin');
});


Route::prefix('admin/category')->group(function () {

    Route::get('/categories-show/{id?}', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth:admin');
    Route::get('/categories/create/{id?}', [CategoryController::class, 'create'])->name('categories.create')->middleware('auth:admin');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('auth:admin');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update')->middleware('auth:admin');
    Route::get('/categories/{id}/show', [CategoryController::class, 'show'])->name('categories.show')->middleware('auth:admin');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete')->middleware('auth:admin');





    Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store')->middleware('auth:admin');

    Route::get('/edit/{category}', [CategoryController::class, 'categoryEdit'])->name('category.edit')->middleware('auth:admin');

    Route::post('/update/{category}', [CategoryController::class, 'categoryUpdate'])->name('category.update')->middleware('auth:admin');

    Route::get('/delete/{category}', [CategoryController::class, 'categoryDelete'])->name('category.delete')->middleware('auth:admin');


    // Admin Sub Category All Routes

    Route::get('/sub/view', [SubCategoryController::class, 'subCategoryView'])->name('all.subcategory')->middleware('auth:admin');

    Route::post('/sub/store', [SubCategoryController::class, 'subCategoryStore'])->name('subcategory.store')->middleware('auth:admin');

    Route::get('/sub/edit/{subcategory}', [SubCategoryController::class, 'subCategoryEdit'])->name('subcategory.edit')->middleware('auth:admin');

    Route::post('/sub/update/{subcategory}', [SubCategoryController::class, 'subCategoryUpdate'])->name('subcategory.update')->middleware('auth:admin');

    Route::get('/sub/delete/{subcategory}', [SubCategoryController::class, 'subCategoryDelete'])->name('subcategory.delete')->middleware('auth:admin');

    // Admin Sub->Sub Category All Routes

    Route::get('/sub/sub/view', [SubSubCategoryController::class, 'subSubCategoryView'])->name('all.subsubcategory')->middleware('auth:admin');

    Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'getSubCategory'])->middleware('auth:admin');

    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'getSubSubCategory'])->middleware('auth:admin');

    Route::post('/sub/sub/store', [SubSubCategoryController::class, 'subSubCategoryStore'])->name('subsubcategory.store')->middleware('auth:admin');

    Route::get('/sub/sub/edit/{sub_subcategory}', [SubSubCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit')->middleware('auth:admin');

    Route::post('sub/sub/update/{sub_subcategory}', [SubSubCategoryController::class, 'subSubCategoryUpdate'])->name('subsubcategory.update')->middleware('auth:admin');

    Route::get('/sub/sub/delete/{sub_subcategory}', [SubSubCategoryController::class, 'subSubCategoryDelete'])->name('subsubcategory.delete')->middleware('auth:admin');
});



// Admin product All Routes

Route::prefix('admin/product')->group(function () {

    Route::get('/add', [ProductController::class, 'addProduct'])->name('add-product')->middleware('auth:admin');

    Route::post('/store', [ProductController::class, 'storeProduct'])->name('store-product')->middleware('auth:admin');

    Route::get('/manage', [ProductController::class, 'manageProduct'])->name('manage-product')->middleware('auth:admin');

    Route::get('/edit/{product}', [ProductController::class, 'editProduct'])->name('edit-product')->middleware('auth:admin');

    Route::post('/data/update/{product}', [ProductController::class, 'UpdateProduct'])->name('update-product')->middleware('auth:admin');

    Route::post('/image/update', [ProductController::class, 'multiImageUpdate'])->name('update-product-image')->middleware('auth:admin');

    Route::post('/thambnail/update/{id}', [ProductController::class, 'thambnailImageUpdate'])->name('update-product-thambnail')->middleware('auth:admin');

    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete')->middleware('auth:admin');

    Route::get('/show/{product}', [ProductController::class, 'showProduct'])->name('show-product')->middleware('auth:admin');

    Route::get('/inactive/{product}', [ProductController::class, 'productInactive'])->name('product.inactive')->middleware('auth:admin');

    Route::get('/active/{product}', [ProductController::class, 'productActive'])->name('product.active')->middleware('auth:admin');

    Route::get('/delete/{product}', [ProductController::class, 'productDelete'])->name('product.delete')->middleware('auth:admin');
});





Route::prefix('admin/slider')->group(function () {

    Route::get('/view', [SliderController::class, 'sliderView'])->name('manage-slider')->middleware('auth:admin');

    Route::post('/store', [SliderController::class, 'sliderStore'])->name('slider.store')->middleware('auth:admin');

    Route::get('/inactive/{slider}', [SliderController::class, 'sliderInactive'])->name('slider.inactive')->middleware('auth:admin');

    Route::get('/active/{slider}', [SliderController::class, 'sliderActive'])->name('slider.active')->middleware('auth:admin');

    Route::get('/delete/{slider}', [SliderController::class, 'sliderDelete'])->name('slider.delete')->middleware('auth:admin');

    Route::post('/update/{id}', [SliderController::class, 'sliderUpdate'])->name('slider.update')->middleware('auth:admin');

    Route::get('/edit/{slider}', [SliderController::class, 'sliderEdit'])->name('slider.edit')->middleware('auth:admin');
});




//// Frontend All Routes /////
/// Multi Language All Routes ////

Route::get('/language/hindi', [LanguageController::class, 'hindi'])->name('hindi.language');

Route::get('/language/english', [LanguageController::class, 'english'])->name('english.language');

Route::get('/language/arabic', [LanguageController::class, 'arabic'])->name('arabic.language');



// Frontend Product Details Page url
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'productDetails']);


//product tags

Route::get('/product/tag/{tag}', [IndexController::class, 'productTag']);


Route::get('/category/product/{id}/{slug}', [IndexController::class, 'categoryWiseProduct']);

// Frontend SubCategory wise Data
Route::get('/subcategory/product/{id}/{slug}', [IndexController::class, 'subCategoryWiseProduct']);

// Frontend Sub-SubCategory wise Data
Route::get('/subsubcategory/product/{id}/{slug}', [IndexController::class, 'subSubCategoryWiseProduct']);

// Product View Modal with Ajax
Route::get('product/view/modal/{id}', [IndexController::class, 'productViewModal']);

//Add To cart with Ajax
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);


// Get Data from mini cart
Route::get('/product/mini/cart/', [CartController::class, 'addMiniCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'removeMiniCart']);

// Add to Wishlist
Route::post('/add-to-wishlist/{product_id}' , [WishlistController::class, 'addToWishlist']);

Route::group(['prefix' => 'user' , 'middleware'=>['user' , 'auth'] , 'namespace'=>'User'], function (){

// Wishlist page
Route::get('/wishlist' , [WishlistController::class, 'viewWishlist'])->name('wishlist');

//send product data to wishlist page
Route::get('/get-wishlist-product' , [WishlistController::class, 'getWishlistProduct']);

//remove product from wishlist
Route::get('/wishlist-remove/{id}' , [WishlistController::class , 'removeWishlistProduct']);




});

//Mycart page
Route::get('/cart' , [CartPageController::class, 'myCart'])->name('my-cart');

Route::get('/user/get-cart-product' , [CartPageController::class, 'getCartProduct']);

Route::delete('/user/cart-remove/{id}' , [CartPageController::class , 'removeCartProduct']);


Route::get('/cart-increment/{rowId}' , [CartPageController::class , 'incrementCartProduct']);

Route::get('/cart-decrement/{rowId}' , [CartPageController::class , 'decrementCartProduct']);


// Admin Coupons All Routes

Route::prefix('admin/coupon')->group(function (){

    Route::get('/view', [CouponController::class , 'couponView'])->name('manage-coupon')->middleware('auth:admin');
    Route::post('/store', [CouponController::class , 'couponStore'])->name('coupon.store')->middleware('auth:admin');
    Route::get('/edit/{coupon}' , [CouponController::class , 'couponEdit'])->name('coupon.edit')->middleware('auth:admin');
    Route::post('update/{id}' , [CouponController::class , 'couponUpdate'])->name('coupon.update')->middleware('auth:admin');
    Route::get('/delete/{coupon}' , [CouponController::class , 'couponDelete'])->name('coupon.delete')->middleware('auth:admin');
});


// Admin Shipping all Routes
Route::prefix('admin/shipping')->group(function () {
   Route::get('/division/view' , [ShippingAreaController::class , 'divisionView'])->name('manage-division')->middleware('auth:admin');
   Route::post('/division/store' , [ShippingAreaController::class , 'divisionStore'])->name('division.store')->middleware('auth:admin');
   Route::get('/division/edit/{shipDivision}' , [ShippingAreaController::class , 'editDivision'])->name('division.edit')->middleware('auth:admin');
   Route::post('/division/update/{id}' , [ShippingAreaController::class , 'updateDivision'])->name('division.update')->middleware('auth:admin');
   Route::get('/division/delete/{shipDivision}' , [ShippingAreaController::class , 'deleteDivision'])->name('division.delete')->middleware('auth:admin');
});


// Admin district all Routes
Route::prefix('admin/district')->group(function () {
    Route::get('/view' , [ShippingDistrictController::class , 'districtView'])->name('manage-district')->middleware('auth:admin');
    Route::post('/store' , [ShippingDistrictController::class , 'districtStore'])->name('district.store')->middleware('auth:admin');
    Route::get('/edit/{district}' , [ShippingDistrictController::class , 'editdistrict'])->name('district.edit')->middleware('auth:admin');
    Route::post('/update/{id}' , [ShippingDistrictController::class , 'updatedistrict'])->name('district.update')->middleware('auth:admin');
    Route::get('/delete/{district}' , [ShippingDistrictController::class , 'deletedistrict'])->name('district.delete')->middleware('auth:admin');
 });



 // Admin state all Routes
Route::prefix('admin/state')->group(function () {
    Route::get('/view' , [ShippingStateController::class , 'stateView'])->name('manage-state')->middleware('auth:admin');
    Route::post('/store' , [ShippingStateController::class , 'stateStore'])->name('state.store')->middleware('auth:admin');
    Route::get('/edit/{state}' , [ShippingStateController::class , 'editstate'])->name('state.edit')->middleware('auth:admin');
    Route::post('/update/{id}' , [ShippingStateController::class , 'updatestate'])->name('state.update')->middleware('auth:admin');
    Route::get('/delete/{state}' , [ShippingStateController::class , 'deletestate'])->name('state.delete')->middleware('auth:admin');
 });

 // Frontend Coupon Option


 Route::post('/coupon-apply' , [CartPageController::class , 'couponApply']);

 Route::get('/coupon-calculation', [CartPageController::class , 'couponCalculation']);

 Route::get('/coupon-remove' , [CartPageController::class , 'couponRemove']);


 //checkout

 Route::get('/checkout', [CartPageController::class , 'checkoutCreate'])->name('checkout');



