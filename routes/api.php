<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

/**
 * -----------------------------------------
 *	Booking Routes
 * -----------------------------------------
 */

Route::prefix('bookings')->group(function () {
    Route::get('', [BookingController::class, 'list']);
    Route::post('', [BookingController::class, 'create']);
    Route::get('report', [BookingController::class, 'findByReportCode']);
    Route::patch('{id}', [BookingController::class, 'update']);
    Route::delete('{id}', [BookingController::class, 'remove']);
});
