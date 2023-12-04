<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\OrderController;

Route::middleware('api')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('otp/verify', [LoginController::class, 'verify']);
    Route::post('otp/resend', [LoginController::class, 'resend']);
    Route::get('orders/config', [OrderController::class, 'config'])->name('order.config');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('orders', [OrderController::class, 'index'])->name('order.index');
        Route::post('orders/calculate', [OrderController::class, 'calculate'])->name('order.calculate');
    });
});
