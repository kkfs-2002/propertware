<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AMCController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VendorTypeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'login_post']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'register_post']);

Route::get('forgotpassword', [AuthController::class, 'forgotpassword']);
Route::post('forgotpassword', [AuthController::class, 'forgotpassword_post']);

Route::get('reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');


Route::group(['middleware' => 'admin'], function () {
   Route::get('admin/dashboard', [DashboardController::class, 'admin_dashboard']);

Route::get('admin/amc/list', [AMCController::class, 'amc_list']);
Route::get('admin/amc/add', [AMCController::class, 'amc_add']);
Route::post('admin/amc/add', [AMCController::class, 'amc_insert']);
Route::get('admin/amc/edit/{id}', [AMCController::class, 'amc_edit']);
Route::post('admin/amc/edit/{id}', [AMCController::class, 'amc_update']);
Route::get('admin/amc/delete/{id}', [AMCController::class, 'amc_delete']);
Route::get('admin/amc/add_ons/{id}', [AMCController::class, 'amc_add_ons_list']);
Route::get('admin/amc/add_add_ons/{id}', [AMCController::class, 'amc_add_add_ons']); 
Route::post('admin/amc/add_add_ons/{id}', [AMCController::class, 'amc_store_add_ons']); 
Route::get('admin/amc/edit_add_ons/{id}', [AMCController::class, 'amc_edit_add_ons']); 
Route::post('admin/amc/edit_add_ons/{id}', [AMCController::class, 'amc_edit_add_ons_update']);
Route::get('admin/amc/delete_add_ons/{id}', [AMCController::class, 'delete_add_ons']); 
Route::get('admin/amc/free_service/{id}', [AMCController::class, 'amc_free_service']);
Route::get('admin/amc/add_free_service/{id}', [AMCController::class, 'amc_add_free_service']);
Route::post('admin/amc/add_free_service/{id}', [AMCController::class, 'amc_store_free_service']); 
Route::get('admin/amc/edit_free_service/{id}', [AMCController::class, 'amc_edit_free_service']);
Route::post('admin/amc/edit_free_service/{id}', [AMCController::class, 'amc_update_free_service']);
Route::get('admin/amc/delete_free_service/{id}',  [AMCController::class, 'amc_delete_free_service']);







Route::get('admin/category/list', [CategoryController::class, 'Category_list']);
Route::get('admin/Category/add', [CategoryController::class, 'Category_add']);
Route::post('admin/category/add', [CategoryController::class, 'Category_insert']);
Route::get('admin/category/edit/{id}', [CategoryController::class, 'Category_edit']);
Route::post('admin/category/edit/{id}', [CategoryController::class, 'Category_update']);
Route::get('admin/category/delete/{id}', [CategoryController::class, 'Category_delete']);


Route::get('admin/service_type/list', [ServiceTypeController::class, 'service_type_list']);
Route::get('admin/service_type/add', [ServiceTypeController::class, 'service_type_add']);
Route::post('admin/service_type/add',  [ServiceTypeController::class, 'service_type_add_post']);
Route::get('admin/service_type/edit/{id}', [ServiceTypeController::class, 'service_type_edit']);
Route::post('admin/service_type/edit/{id}', [ServiceTypeController::class, 'service_type_edit_update']);
Route::get('admin/service_type/delete/{id}', [ServiceTypeController::class, 'service_type_delete']);


Route::get('admin/sub_category/list', [SubCategoryController::class, 'sub_category_list']);
Route::get('admin/sub_category/add', [SubCategoryController::class, 'sub_category_add']);
Route::post('admin/sub_category/add', [SubCategoryController::class, 'sub_category_store']);
Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'sub_category_edit']);
Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class, 'sub_category_update']);
Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'sub_category_delete']);


Route::get('admin/Vendor_type/list', [VendorTypeController::class, 'Vendor_type_list']);
Route::get('admin/Vendor_type/add', [VendorTypeController::class, 'Vendor_type_add']);
Route::post('admin/Vendor_type/add', [VendorTypeController::class, 'Vendor_type_store']);
Route::get ('admin/Vendor_type/edit/{id}', [VendorTypeController::class, 'Vendor_type_edit']);
Route::post('admin/Vendor_type/edit/{id}', [VendorTypeController::class, 'Vendor_type_update']); 
Route::get ('admin/Vendor_type/delete/{id}', [VendorTypeController::class, 'Vendor_type_delete']);
});

Route::group(['middleware' => 'user'], function () {
    Route::get('user/dashboard', [DashboardController::class, 'user_dashboard']);
});

Route::group(['middleware' => 'vendor'], function () {
    Route::get('vendor/dashboard', [DashboardController::class, 'vendor_dashboard']);
});

Route::get('logout', [AuthController::class, 'logout']);