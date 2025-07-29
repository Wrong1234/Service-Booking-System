<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Booking;

//all users
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

//customer and admin
Route::prefix('services')->middleware('auth:sanctum')->group(function () {
   Route::get('/', [ServiceController::class, 'index']);
});

//customer and admin
Route::prefix('bookings')->middleware('auth:sanctum')->group(function () {
     Route::post('/', [BookingController::class, 'store']);
     Route::get('/', [BookingController::class, 'userAllBooking']);
});

//customer and admin
Route::prefix('users')->middleware('auth:sanctum')->group(function () {
   Route::post('/logout', [AuthController::class, 'destroy']);
});


//users routing only admin
Route::prefix('users')->middleware('auth:sanctum', RoleMiddleware::class )->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
});

//service routing only admin
Route::prefix('services')->middleware('auth:sanctum', RoleMiddleware::class)->group(function () {
    Route::post('/store', [ServiceController::class, 'store']);
    Route::get('/{service}', [ServiceController::class, 'show']);
    Route::put('/{service}', [ServiceController::class, 'update']);
    Route::delete('/{service}', [ServiceController::class, 'destroy']);
});


//Booking routing only admin
Route::prefix('admin/bookings')->middleware('auth:sanctum', RoleMiddleware::class)->group(function () {
    Route::get('/', [BookingController::class, 'index']);
});