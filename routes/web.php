<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AMCController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VendorTypeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookServiceController;
use App\Http\Controllers\MaintenanceAgreementController;
use App\Http\Controllers\_ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AvailabilityController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'login_post']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'register_post']);
Route::get('vendor/password/{token}', [VendorController::class, 'vendor_password']);
Route::post('vendor/password/{token}', [VendorController::class, 'vendor_password_post']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);

Route::get('forgotpassword', [AuthController::class, 'forgotpassword']);
Route::post('forgotpassword', [AuthController::class, 'forgotpassword_post']);
Route::post('/forgotpassword', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

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
Route::get('admin/Vendor_type/edit/{id}', [VendorTypeController::class, 'Vendor_type_edit']);
Route::post('admin/Vendor_type/edit/{id}', [VendorTypeController::class, 'Vendor_type_update']); 
Route::get('admin/Vendor_type/delete/{id}', [VendorTypeController::class, 'Vendor_type_delete']);


Route::get('admin/vendor/list', [VendorController::class, 'vendor_list' ]);
Route::get('admin/vendor/add', [VendorController::class, 'vendor_add' ]);
Route::post('admin/vendor/add',  [VendorController::class, 'vendor_store' ]);
Route::get('admin/vendor/edit/{id}', [VendorController::class, 'vendor_edit']);
Route::post('admin/vendor/edit/{id}', [VendorController::class, 'vendor_update']); 
Route::get('admin/vendor/delete/{id}',  [VendorController::class, 'vendor_delete']);


Route::get('admin/user/list', [UserController::class, 'user_list']);
Route::get('admin/user/add', [UserController::class, 'user_add']);
Route::post('admin/user/add', [UserController::class, 'user_store']);
Route::get('admin/user/edit/{id}', [UserController::class, 'user_edit']);
Route::post('admin/user/edit/{id}', [UserController::class, 'user_update']);
Route::get('admin/user/delete/{id}', [UserController::class, 'user_delete']);

Route::get('admin/profile/list', [ProfileController::class, 'profile_list']);
Route::get('admin/profile/add', [ProfileController::class, 'profile_add']);
Route::post('admin/profile/add', [ProfileController::class, 'profile_store']);
Route::get('admin/profile/edit/{id}', [ProfileController::class, 'profile_edit']);
Route::post('admin/profile/edit/{id}', [ProfileController::class, 'profile_update']);
Route::get('admin/profile/delete/{id}', [ProfileController::class, 'profile_delete']);
});



    Route::group(['middleware' => 'user'], function () {
    Route::get('user/dashboard', [DashboardController::class, 'user_dashboard']);


   Route::get('user/book_service/add', [BookServiceController::class, 'book_service_add']);
   Route::post('user/book_service/sub_category', [BookServiceController::class, 'sub_category_dropdown']);
   Route::post('user/book_service/add', [BookServiceController::class, 'book_service_store']);
   Route::get('user/service_history/list',  [BookServiceController::class, 'service_history_list']);
   Route::get('user//edit{id}', [BookServiceController::class, 'service_history_edit']);
   Route::get('user/book_service/edit/{id}', [BookServiceController::class, 'book_service_edit']);
   Route::post('user/book_service/edit/{id}', [BookServiceController::class, 'book_service_update']);
   Route::get('user/book_service/delete/{id}', [BookServiceController::class, 'book_service_delete']);

  Route::get('user/maintenance_agreement/list', [MaintenanceAgreementController::class, 'maintenance_agreement_list']);
  Route::get('user/maintenance_agreement/add', [MaintenanceAgreementController::class, 'maintenance_agreement_add']);
  Route::post('user/maintenance_agreement/store', [MaintenanceAgreementController::class, 'maintenance_agreement_store']);
  Route::get('user/maintenance_agreement/edit/{id}', [MaintenanceAgreementController::class, 'maintenance_agreement_edit']);
Route::post('user/maintenance_agreement/edit/{id}', [MaintenanceAgreementController::class, 'maintenance_agreement_update']);
Route::get('user/maintenance_agreement/delete/{id}', [MaintenanceAgreementController::class, 'maintenance_agreement_delete']);


Route::get('user/_profile/list', [_ProfileController::class, '_profile_list']);
Route::get('user/_profile/add', [_ProfileController::class, '_profile_add']);
Route::post('user/_profile/add', [_ProfileController::class, '_profile_store']);
Route::get('user/_profile/edit/{id}', [_ProfileController::class, '_profile_edit']);
Route::post('user/_profile/edit/{id}', [_ProfileController::class, '_profile_update']);
Route::get('user/_profile/delete/{id}', [_ProfileController::class, '_profile_delete']);


});

Route::group(['middleware' => 'vendor'], function () {
    Route::get('vendor/dashboard', [DashboardController::class, 'vendor_dashboard']);

    Route::get('vendor/appointments/list', [AppointmentController::class, 'appointment_list']);
    Route::get('vendor/appointments/add', [AppointmentController::class, 'appointment_add']);
    Route::post('vendor/appointments/store', [AppointmentController::class, 'appointment_store']);
    Route::get('vendor/appointments/edit/{id}', [AppointmentController::class, 'appointment_edit']);
    Route::post('vendor/appointments/update/{id}', [AppointmentController::class, 'appointment_update']);
    Route::get('vendor/appointments/delete/{id}', [AppointmentController::class, 'appointment_delete']);

    Route::get('vendor/availability/list', [AvailabilityController::class, 'availability_list']);
    Route::get('vendor/availability/add', [AvailabilityController::class, 'availability_add']);
    Route::post('vendor/availability/store', [AvailabilityController::class, 'availability_store']);
    Route::get('vendor/availability/edit/{id}', [AvailabilityController::class, 'availability_edit']);
    Route::post('vendor/availability/update/{id}', [AvailabilityController::class, 'availability_update']);
    Route::get('vendor/availability/delete/{id}', [AvailabilityController::class, 'availability_delete']);


});

Route::get('logout', [AuthController::class, 'logout']);