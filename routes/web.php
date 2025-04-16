<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AMCController;
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

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'login_post']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'register_post']);


Route::group(['middleware' => 'admin'], function () {
   Route::get('admin/dashboard', [DashboardController::class, 'admin_dashboard']);

Route::get('admin/amc/list', [AMCController::class, 'amc_list']);
Route::get('admin/amc/add', [AMCController::class, 'amc_add']);
Route::post('admin/amc/add', [AMCController::class, 'amc_insert']);

Route::get('admin/amc/edit/{id}', [AMCController::class, 'amc_edit']);
  
Route::post('admin/amc/edit/{id}', [AMCController::class, 'amc_update']);
});

Route::group(['middleware' => 'user'], function () {
    Route::get('user/dashboard', [DashboardController::class, 'user_dashboard']);
});

Route::group(['middleware' => 'vendor'], function () {
    Route::get('vendor/dashboard', [DashboardController::class, 'vendor_dashboard']);
});

Route::get('logout', [AuthController::class, 'logout']);