<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;

Route::middleware('api')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('otp/verify', [LoginController::class, 'verify']);
    Route::post('otp/resend', [LoginController::class, 'resend']);

    Route::middleware('auth:sanctum')->group(function () {

    });
});
