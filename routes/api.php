<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/**
 * -----------------------------------------
 *	User Routes
 * -----------------------------------------
 */
Route::prefix('users')->group(function () {
    Route::post('login', [UserController::class, 'login']);
});
/**
 * -----------------------------------------
 *	Booking Routes
 * -----------------------------------------
 */

Route::prefix('bookings')->middleware(['auth:sanctum'])->group(function () {
    Route::get('', [BookingController::class, 'list']);
    Route::post('', [BookingController::class, 'create']);
    Route::get('report', [BookingController::class, 'findByReportCode']);
    Route::patch('{id}', [BookingController::class, 'update']);
    Route::delete('{id}', [BookingController::class, 'remove']);
});
