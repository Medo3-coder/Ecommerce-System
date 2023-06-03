<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Admin\ShippingDistrictController;
use App\Http\Controllers\Admin\ShippingStateController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['web-cors']], function () {
    Route::get('/lang/{lang}', [AuthController::class, 'SetLanguage']);

    Route::get('login', [AuthController::class, 'showLoginForm'])->name('show.login')->middleware('guest:admin');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['admin', 'admin-lang']], function () {
        //admin home
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
        //admins
        Route::get('/admins', [AdminsController::class, 'index'])->name('admin.index');
        Route::get('/admins/create', [AdminsController::class, 'create'])->name('admin.create');
        Route::get('/admins/{id}/edit', [AdminsController::class, 'edit'])->name('admin.edit');
        Route::post('/admins/store', [AdminsController::class, 'store'])->name('admin.store');
        Route::put('/admins/{id}', [AdminsController::class, 'update'])->name('admin.update');
        Route::get('/admins/{id}/show', [AdminsController::class, 'show'])->name('admin.show');
        Route::delete('/admins/{id}', [AdminsController::class, 'destroy'])->name('admin.delete');

        //brands
        Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
        Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
        Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
        Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
        Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brands.update');
        Route::get('/brands/{id}/show', [BrandController::class, 'show'])->name('brands.show');
        Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.delete');

        //sliders
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::get('/sliders/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::post('/sliders/store', [SliderController::class, 'store'])->name('sliders.store');
        Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('sliders.update');
        Route::get('/sliders/{id}/show', [SliderController::class, 'show'])->name('sliders.show');
        Route::delete('/sliders/{id}', [SliderController::class, 'destroy'])->name('sliders.delete');
        // Route::get('/inactive/{slider}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');
        // Route::get('/active/{slider}', [SliderController::class, 'sliderActive'])->name('slider.active');

        // categories
        Route::get('/categories-show/{id?}', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create/{id?}', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/categories/{id}/show', [CategoryController::class, 'show'])->name('categories.show');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
        Route::get('subcategories/{id}', [CategoryController::class, 'subcategories'])->name('getSubcategories');

        //coupons
        Route::get('/coupons', [CouponController::class, 'index'])->name('coupons.index');
        Route::get('/coupons/create', [CouponController::class, 'create'])->name('coupons.create');
        Route::get('/coupons/{id}/edit', [CouponController::class, 'edit'])->name('coupons.edit');
        Route::post('/coupons/store', [CouponController::class, 'store'])->name('coupons.store');
        Route::post('/coupons/renew', [CouponController::class, 'renew'])->name('coupons.renew');
        Route::put('/coupons/{id}', [CouponController::class, 'update'])->name('coupons.update');
        Route::get('/coupons/{id}/show', [CouponController::class, 'show'])->name('coupons.show');
        Route::delete('/coupons/{id}', [CouponController::class, 'destroy'])->name('coupons.delete');

        // products
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('products.show');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');

        //division
        Route::get('/division', [ShippingAreaController::class, 'index'])->name('division.index');
        Route::get('/division/create', [ShippingAreaController::class, 'create'])->name('division.create');
        Route::get('/division/{id}/edit', [ShippingAreaController::class, 'edit'])->name('division.edit');
        Route::post('/division/store', [ShippingAreaController::class, 'store'])->name('division.store');
        Route::put('/division/{id}', [ShippingAreaController::class, 'update'])->name('division.update');
        Route::get('/division/{id}/show', [ShippingAreaController::class, 'show'])->name('division.show');
        Route::delete('/division/{id}', [ShippingAreaController::class, 'destroy'])->name('division.delete');

        //district
        Route::get('/district', [ShippingDistrictController::class, 'index'])->name('district.index');
        Route::get('/district/create', [ShippingDistrictController::class, 'create'])->name('district.create');
        Route::get('/district/{id}/edit', [ShippingDistrictController::class, 'edit'])->name('district.edit');
        Route::post('/district/store', [ShippingDistrictController::class, 'store'])->name('district.store');
        Route::put('/district/{id}', [ShippingDistrictController::class, 'update'])->name('district.update');
        Route::get('/district/{id}/show', [ShippingDistrictController::class, 'show'])->name('district.show');
        Route::delete('/district/{id}', [ShippingDistrictController::class, 'destroy'])->name('district.delete');

        //state
        Route::get('/state', [ShippingStateController::class, 'index'])->name('state.index');
        Route::get('/state/create', [ShippingStateController::class, 'create'])->name('state.create');
        Route::get('/state/{id}/edit', [ShippingStateController::class, 'edit'])->name('state.edit');
        Route::post('/state/store', [ShippingStateController::class, 'store'])->name('state.store');
        Route::put('/state/{id}', [ShippingStateController::class, 'update'])->name('state.update');
        Route::get('/state/{id}/show', [ShippingStateController::class, 'show'])->name('state.show');
        Route::delete('/state/{id}', [ShippingStateController::class, 'destroy'])->name('state.delete');

    });
});
