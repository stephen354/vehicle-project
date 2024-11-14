<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ApprovalHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleOrderController;
use App\Http\Controllers\VehicleUsageController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authmiddleware'], function () {

Route::get('/', [DashboardController::class,'index'])->name('dashboard');

// VEHICLE
Route::get('/vehicle',[VehicleController::class,'index'])->name('vehicle');
Route::post('/vehicle/store',[VehicleController::class,'store'])->name('vehicle--store');
Route::post('/vehicle/delete',[VehicleController::class,'delete'])->name('vehicle--delete');


    Route::group(['middleware' => 'authadmin'], function () {
        
    //USERS
    Route::get('/users',[UsersController::class,'index'])->name('users');
    Route::post('/users/store',[UsersController::class,'store'])->name('users--store');
    Route::post('/users/delete',[UsersController::class,'delete'])->name('users--delete');

    // VEHICLE ORDER
    Route::get('/vehicle-order',[VehicleOrderController::class,'index'])->name('vehicle-order');
    Route::post('/vehicle-order/store',[VehicleOrderController::class,'store'])->name('vehicle-order--store');
    Route::post('/vehicle-order/delete',[VehicleOrderController::class,'delete'])->name('vehicle-order--delete');

    });
// APPROVAL
Route::get('/approval',[ApprovalController::class,'index'])->name('approval');
Route::post('/approval/store',[ApprovalController::class,'store'])->name('approval--store');

// VEHICLE USAGE
Route::get('/vehicle-usage',[VehicleUsageController::class,'index'])->name('vehicle-usage');
Route::get('/vehicle-usage/export/excel',[VehicleUsageController::class,'export_excel'])->name('vehicle-usage--excel');

// LOG APPROVAL
Route::get('/log-approval', [ApprovalHistoryController::class,'index'])->name('log-approval');
Route::get('/log-approval/export/excel', [ApprovalHistoryController::class,'export_excel'])->name('log-approval--excel');
});

// LOGIN
Route::get('/auth/login',[LoginController::class,'index'])->name('auth-view');
Route::post('/auth/action/login',[LoginController::class,'login'])->name('auth-login');
Route::get('/auth/action/logout',[LoginController::class,'logout'])->name('auth-logout');
