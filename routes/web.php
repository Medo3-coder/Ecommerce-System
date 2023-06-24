<?php

use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CartPageController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\UserController;
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

//user all routes

Route::get('lang/{lang}', [HomeController::class, 'SetLanguage'])->name('SetLanguage');

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('site-login', [AuthController::class, 'login'])->name('siteLogin');
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');

});

Route::group(['middleware' => ['auth.status']], function () {

    Route::group(['middleware' => ['auth.check']], function () {
        Route::get('user/dashboard', [UserController::class, "userDashboard"])->name('user.dashboard');
        Route::get('user/logout', [UserController::class, 'userLogout'])->name('user.logout');
        Route::get('user/profile', [UserController::class, 'userProfile'])->name('user.profile');
        Route::post('user/profile/store', [UserController::class, 'userProfileStore'])->name('user.profile.store');
        Route::get('user/change/password', [UserController::class, 'userChangePassword'])->name('change.password');
        Route::post('user/pasword/update', [UserController::class, 'userPasswordUpdate'])->name('user.password.update');

        //cart page need to login first then add to cart
        Route::get('/cart', [CartPageController::class, 'myCart'])->name('my-cart');
        Route::get('/user/get-cart-product', [CartPageController::class, 'getCartProduct']);
        Route::delete('/user/cart-remove/{id}', [CartPageController::class, 'removeCartProduct']);
        Route::get('/cart-increment/{rowId}', [CartPageController::class, 'incrementCartProduct']);
        Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'decrementCartProduct']);
        Route::post('/coupon-apply', [CartPageController::class, 'couponApply']);
        Route::get('/coupon-calculation', [CartPageController::class, 'couponCalculation']);
        Route::get('/coupon-remove', [CartPageController::class, 'couponRemove']);
        //checkout
        Route::get('/checkout', [CartPageController::class, 'checkoutCreate'])->name('checkout');
    });

    Route::get('/', [HomeController::class, 'home']);

});

//// Frontend All Routes /////
/// Multi Language All Routes ////

Route::get('/language/hindi', [LanguageController::class, 'hindi'])->name('hindi.language');

// Frontend Product Details Page url
Route::get('/product/details/{id}/{slug}', [HomeController::class, 'productDetails']);

//product tags

Route::get('/product/tag/{tag}', [HomeController::class, 'productTag']);

Route::get('/category/product/{id}/{slug}', [HomeController::class, 'categoryWiseProduct']);

// Frontend SubCategory wise Data
Route::get('/subcategory/product/{id}/{slug}', [HomeController::class, 'subCategoryWiseProduct']);

// Frontend Sub-SubCategory wise Data
Route::get('/subsubcategory/product/{id}/{slug}', [HomeController::class, 'subSubCategoryWiseProduct']);

// Product View Modal with Ajax
Route::get('product/view/modal/{id}', [HomeController::class, 'productViewModal']);

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

// Admin Coupons All Routes

// Frontend Coupon Option
