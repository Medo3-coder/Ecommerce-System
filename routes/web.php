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
use App\Http\Controllers\Site\AuthController;
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

// Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
//     Route::get('/login', [AdminController::class, 'loginForm']);
//     Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
// });

Route::middleware(['auth:admin'])->group(function () {

    // Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    //     return view('admin.index');
    // })->name('dashboard');

    // Admin All Routes
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/change/password', [AdminProfileController::class, 'adminProfilepassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'adminUpdateChangePassword'])->name('update.change.password');
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
});

//user all routes




Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('site-login', [AuthController::class, 'login'])->name('siteLogin');
});



    // Route::middleware(['middleware' => ['auth.status']])->get('/dashboard', function () {
    //     return view('dashboard');
    // });


    Route::group(['middleware' => ['auth.status']], function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('user.dashboard');
    });




Route::get('/', [IndexController::class, 'index']);

Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');

Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');

Route::get('/user/change/password', [IndexController::class, 'userChangePassword'])->name('change.password');

Route::post('/user/pasword/update', [IndexController::class, 'userPasswordUpdate'])->name('user.password.update');







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



// Frontend Coupon Option

Route::post('/coupon-apply', [CartPageController::class, 'couponApply']);

Route::get('/coupon-calculation', [CartPageController::class, 'couponCalculation']);

Route::get('/coupon-remove', [CartPageController::class, 'couponRemove']);

//checkout

Route::get('/checkout', [CartPageController::class, 'checkoutCreate'])->name('checkout');
