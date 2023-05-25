<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Admin\ShippingDistrictController;
use App\Http\Controllers\Admin\ShippingStateController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\IndexController;
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

Route::prefix('admin/admins')->group(function () {

    Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index')->middleware('auth:admin');
    Route::get('/admin/create', [AdminsController::class, 'create'])->name('admin.create')->middleware('auth:admin');
    Route::get('/admin/{id}/edit', [AdminsController::class, 'edit'])->name('admin.edit')->middleware('auth:admin');
    Route::post('/admin/store', [AdminsController::class, 'store'])->name('admin.store')->middleware('auth:admin');
    Route::put('/admin/{id}', [AdminsController::class, 'update'])->name('admin.update')->middleware('auth:admin');
    Route::get('/admin/{id}/show', [AdminsController::class, 'show'])->name('admin.show')->middleware('auth:admin');
    Route::delete('/admin/{id}', [AdminsController::class, 'destroy'])->name('admin.delete')->middleware('auth:admin');
});

Route::get('/', [IndexController::class, 'index']);

Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');

Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');

Route::get('/user/change/password', [IndexController::class, 'userChangePassword'])->name('change.password');

Route::post('/user/pasword/update', [IndexController::class, 'userPasswordUpdate'])->name('user.password.update');

// Admin Brand All Routes

Route::prefix('admin/brand')->group(function () {

    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index')->middleware('auth:admin');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create')->middleware('auth:admin');
    Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit')->middleware('auth:admin');
    Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store')->middleware('auth:admin');
    Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update')->middleware('auth:admin');
    Route::get('/brands/{id}/show', [BrandController::class, 'show'])->name('brands.show')->middleware('auth:admin');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.delete')->middleware('auth:admin');
});

Route::prefix('admin/slider')->group(function () {

    Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index')->middleware('auth:admin');
    Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create')->middleware('auth:admin');
    Route::get('/sliders/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit')->middleware('auth:admin');
    Route::post('/sliders/store', [SliderController::class, 'store'])->name('sliders.store')->middleware('auth:admin');
    Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('sliders.update')->middleware('auth:admin');
    Route::get('/sliders/{id}/show', [SliderController::class, 'show'])->name('sliders.show')->middleware('auth:admin');
    Route::delete('/sliders/{id}', [SliderController::class, 'destroy'])->name('sliders.delete')->middleware('auth:admin');
    // Route::get('/inactive/{slider}', [SliderController::class, 'sliderInactive'])->name('slider.inactive')->middleware('auth:admin');
    // Route::get('/active/{slider}', [SliderController::class, 'sliderActive'])->name('slider.active')->middleware('auth:admin');
});

Route::prefix('admin/category')->group(function () {

    Route::get('/categories-show/{id?}', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth:admin');
    Route::get('/categories/create/{id?}', [CategoryController::class, 'create'])->name('categories.create')->middleware('auth:admin');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('auth:admin');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store')->middleware('auth:admin');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update')->middleware('auth:admin');
    Route::get('/categories/{id}/show', [CategoryController::class, 'show'])->name('categories.show')->middleware('auth:admin');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete')->middleware('auth:admin');
    Route::get('subcategories/{id}', [CategoryController::class, 'subcategories'])->name('getSubcategories')->middleware('auth:admin');

});

Route::prefix('admin/coupon')->group(function () {

    Route::get('/coupons', [CouponController::class, 'index'])->name('coupons.index')->middleware('auth:admin');
    Route::get('/coupons/create', [CouponController::class, 'create'])->name('coupons.create')->middleware('auth:admin');
    Route::get('/coupons/{id}/edit', [CouponController::class, 'edit'])->name('coupons.edit')->middleware('auth:admin');
    Route::post('/coupons/store', [CouponController::class, 'store'])->name('coupons.store')->middleware('auth:admin');
    Route::post('/coupons/renew', [CouponController::class, 'renew'])->name('coupons.renew')->middleware('auth:admin');
    Route::put('/coupons/{id}', [CouponController::class, 'update'])->name('coupons.update')->middleware('auth:admin');
    Route::get('/coupons/{id}/show', [CouponController::class, 'show'])->name('coupons.show')->middleware('auth:admin');
    Route::delete('/coupons/{id}', [CouponController::class, 'destroy'])->name('coupons.delete')->middleware('auth:admin');
});

// Admin product All Routes

Route::prefix('admin/product')->group(function () {

    Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth:admin');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth:admin');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth:admin');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store')->middleware('auth:admin');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update')->middleware('auth:admin');
    Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('products.show')->middleware('auth:admin');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete')->middleware('auth:admin');

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
Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'addToWishlist']);

Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {

// Wishlist page
    Route::get('/wishlist', [WishlistController::class, 'viewWishlist'])->name('wishlist');

//send product data to wishlist page
    Route::get('/get-wishlist-product', [WishlistController::class, 'getWishlistProduct']);

//remove product from wishlist
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'removeWishlistProduct']);

});

//Mycart page
Route::get('/cart', [CartPageController::class, 'myCart'])->name('my-cart');

Route::get('/user/get-cart-product', [CartPageController::class, 'getCartProduct']);

Route::delete('/user/cart-remove/{id}', [CartPageController::class, 'removeCartProduct']);

Route::get('/cart-increment/{rowId}', [CartPageController::class, 'incrementCartProduct']);

Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'decrementCartProduct']);

// Admin Coupons All Routes

// Admin Shipping all Routes
Route::prefix('admin/shipping')->group(function () {
    Route::get('/division/view', [ShippingAreaController::class, 'divisionView'])->name('manage-division')->middleware('auth:admin');
    Route::post('/division/store', [ShippingAreaController::class, 'divisionStore'])->name('division.store')->middleware('auth:admin');
    Route::get('/division/edit/{shipDivision}', [ShippingAreaController::class, 'editDivision'])->name('division.edit')->middleware('auth:admin');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'updateDivision'])->name('division.update')->middleware('auth:admin');
    Route::get('/division/delete/{shipDivision}', [ShippingAreaController::class, 'deleteDivision'])->name('division.delete')->middleware('auth:admin');
});

// Admin district all Routes
Route::prefix('admin/district')->group(function () {
    Route::get('/view', [ShippingDistrictController::class, 'districtView'])->name('manage-district')->middleware('auth:admin');
    Route::post('/store', [ShippingDistrictController::class, 'districtStore'])->name('district.store')->middleware('auth:admin');
    Route::get('/edit/{district}', [ShippingDistrictController::class, 'editdistrict'])->name('district.edit')->middleware('auth:admin');
    Route::post('/update/{id}', [ShippingDistrictController::class, 'updatedistrict'])->name('district.update')->middleware('auth:admin');
    Route::get('/delete/{district}', [ShippingDistrictController::class, 'deletedistrict'])->name('district.delete')->middleware('auth:admin');
});

// Admin state all Routes
Route::prefix('admin/state')->group(function () {
    Route::get('/view', [ShippingStateController::class, 'stateView'])->name('manage-state')->middleware('auth:admin');
    Route::post('/store', [ShippingStateController::class, 'stateStore'])->name('state.store')->middleware('auth:admin');
    Route::get('/edit/{state}', [ShippingStateController::class, 'editstate'])->name('state.edit')->middleware('auth:admin');
    Route::post('/update/{id}', [ShippingStateController::class, 'updatestate'])->name('state.update')->middleware('auth:admin');
    Route::get('/delete/{state}', [ShippingStateController::class, 'deletestate'])->name('state.delete')->middleware('auth:admin');
});

// Frontend Coupon Option

Route::post('/coupon-apply', [CartPageController::class, 'couponApply']);

Route::get('/coupon-calculation', [CartPageController::class, 'couponCalculation']);

Route::get('/coupon-remove', [CartPageController::class, 'couponRemove']);

//checkout

Route::get('/checkout', [CartPageController::class, 'checkoutCreate'])->name('checkout');
