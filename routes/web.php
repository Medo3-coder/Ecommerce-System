<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\backend\SubSubCategoryController;
use App\Http\Controllers\frontend\IndexController;
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

Route::prefix('brand')->group(function () {

    Route::get('/view', [BrandController::class, 'brandView'])->name('all.brand');

    Route::post('/store', [BrandController::class, 'brandStore'])->name('brand.store');

    Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit');

    Route::post('/update/{id}', [BrandController::class, 'brandUpdate'])->name('brand.update');

    Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete');
});


Route::prefix('category')->group(function () {

    Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');

    Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');

    Route::get('/edit/{category}', [CategoryController::class, 'categoryEdit'])->name('category.edit');

    Route::post('/update/{category}', [CategoryController::class, 'categoryUpdate'])->name('category.update');

    Route::get('/delete/{category}', [CategoryController::class, 'categoryDelete'])->name('category.delete');


    // Admin Sub Category All Routes

    Route::get('/sub/view', [SubCategoryController::class, 'subCategoryView'])->name('all.subcategory');

    Route::post('/sub/store', [SubCategoryController::class, 'subCategoryStore'])->name('subcategory.store');

    Route::get('/sub/edit/{subcategory}', [SubCategoryController::class, 'subCategoryEdit'])->name('subcategory.edit');

    Route::post('/sub/update/{subcategory}', [SubCategoryController::class, 'subCategoryUpdate'])->name('subcategory.update');

    Route::get('/sub/delete/{subcategory}', [SubCategoryController::class, 'subCategoryDelete'])->name('subcategory.delete');

    // Admin Sub->Sub Category All Routes

    Route::get('/sub/sub/view', [SubSubCategoryController::class, 'subSubCategoryView'])->name('all.subsubcategory');

    Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'getSubCategory']);

    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'getSubSubCategory']);

    Route::post('/sub/sub/store', [SubSubCategoryController::class, 'subSubCategoryStore'])->name('subsubcategory.store');

    Route::get('/sub/sub/edit/{sub_subcategory}', [SubSubCategoryController::class, 'subSubCategoryEdit'])->name('subsubcategory.edit');

    Route::post('sub/sub/update/{sub_subcategory}', [SubSubCategoryController::class, 'subSubCategoryUpdate'])->name('subsubcategory.update');

    Route::get('/sub/sub/delete/{sub_subcategory}', [SubSubCategoryController::class, 'subSubCategoryDelete'])->name('subsubcategory.delete');
});



// Admin product All Routes

Route::prefix('product')->group(function () {

    Route::get('/add', [ProductController::class, 'addProduct'])->name('add-product');


});
