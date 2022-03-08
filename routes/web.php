<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
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

Route::get('/', function () {
    return view('welcome');
});


//front routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('User_dashboard');




//admin route

Route::group(['prefix' => 'admin' , 'middleware' =>['admin:admin']] , function(){
    Route::get('/login' , [AdminController::class , 'loginForm']);
    Route::post('/login' , [AdminController::class , 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');



Route::get('/admin/profile' , [AdminProfileController::class , 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit' , [AdminProfileController::class , 'adminProfileEdit'])->name('admin.profile.edit');

Route::get('/admin/logout' , [AdminController::class , 'destroy'])->name('admin.logout');


