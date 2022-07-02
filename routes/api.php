<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/**
 * -----------------------------------------
 *	No auth Routes
 * -----------------------------------------
 */
Route::post('users/login', [UserController::class, 'login']);
Route::get('bookings/report', [BookingController::class, 'findByReportCode']);
/**
 * -----------------------------------------
 *	Require Auth Routes
 * -----------------------------------------
 */

Route::middleware(['auth:sanctum'])->group(function () {
    /**
     * -----------------------------------------
     *	Bookings Routes
     * -----------------------------------------
     */
    Route::apiResource('bookings', BookingController::class);
    /**
     * -----------------------------------------
     *	Rooms Routes
     * -----------------------------------------
     */
    Route::post('rooms/available', [RoomController::class, 'listAvailable']);
    Route::get('rooms/{id}/available', [RoomController::class, 'available']);
    Route::apiResource('rooms', RoomController::class);
    /**
     * -----------------------------------------
     *	Tasks Routes
     * -----------------------------------------
     */
    Route::get('tasks/all', [TaskController::class, 'all']);
    Route::apiResource('tasks', TaskController::class);
});
