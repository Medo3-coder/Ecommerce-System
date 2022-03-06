<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::group(['prefix' => 'admin'], function () {

//     Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');

//     Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');


//     Route::group(['middleware' => 'auth:admin'], function () {

//         Route::get('/', function () {
//             return view('admin.index');
//         })->name('admin.dashboard');
//     });
// });
