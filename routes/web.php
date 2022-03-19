<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
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

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');




Route::group(['middleware' => ['auth:sanctum,admin', 'verified']], function () {

    //Profile
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/change/password', [AdminProfileController::class, 'adminProfilepassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'adminUpdateChangePassword'])->name('update.change.password');

    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
});



// Route::get('/admin/profile/edit' , [AdminProfileController::class , 'adminProfileEdit'])->name('admin.profile.edit');



//user all routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('User_dashboard');

Route::get('/', [IndexController::class , 'index']);



Route::get('/user/logout', [IndexController::class , 'userLogout'])->name('user.logout');


Route::get('/user/profile', [IndexController::class , 'userProfile'])->name('user.profile');

Route::post('/user/profile/store', [IndexController::class , 'userProfileStore'])->name('user.profile.store');

