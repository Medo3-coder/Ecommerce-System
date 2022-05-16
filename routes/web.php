<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\backend\SubSubCategoryController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\backend\SliderController;
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

    Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category')->middleware('auth:admin');

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
