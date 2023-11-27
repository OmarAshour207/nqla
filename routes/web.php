<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\VerifyOtpController;
use App\Http\Controllers\Dashboard\TruckController;
use App\Http\Controllers\Dashboard\TruckTypeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\PriceController;
use App\Http\Controllers\Dashboard\LoadController;
use App\Http\Controllers\Dashboard\InsuranceController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Auth\LoginController as UserLoginController;
use App\Http\Controllers\Frontend\Auth\VerifyOtpController as UserVerifyOtpController;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Frontend\ProfileController as UserProfileController;
use App\Http\Controllers\Frontend\OrderController as UserOrderController;


// Dashboard

Route::get('/dashboard/login', [LoginController::class, 'showForm'])->name('dashboard.loginform');
Route::post('/dashboard/login', [LoginController::class, 'login'])->name('dashboard.login');

Route::middleware(['admin'])->prefix('dashboard')->group(function () {

    Route::get('otp/show', [VerifyOtpController::class, 'showPage'])->name('dashboard.showotp');
    Route::post('otp/verify', [VerifyOtpController::class, 'verifyCode'])->name('dashboard.verifyotp');
    Route::get('otp/resend', [LoginController::class, 'generateCode'])->name('dashboard.resendotp');
    Route::post('logout', [LoginController::class, 'logout'])->name('dashboard.logout');

    Route::middleware(['otp'])->group(function () {
        Route::get('index', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('trucks', TruckController::class);
        Route::resource('truck/types', TruckTypeController::class);

        Route::resource('cities', CityController::class);

        Route::resource('prices', PriceController::class);

        Route::post('trucks/types', [PriceController::class, 'getTypes'])->name('trucks.types');

        Route::resource('insurances', InsuranceController::class);

        Route::resource('loads', LoadController::class);

        Route::resource('users', UserController::class);

        Route::get('notifications/clear', [NotificationController::class, 'clear'])->name('notifications.clear');

        Route::get('profile/edit', [ProfileController::class, 'edit'])->name('edit.profile');
        Route::post('profile/edit', [ProfileController::class, 'update'])->name('update.profile');

        Route::post('/upload/image', [ImageController::class, 'uploadPhoto'])->name('upload.image');
        Route::post('/remove/image', [ImageController::class, 'removePhoto'])->name('remove.image');

        Route::get('/language/{locale}', [SettingController::class, 'changeLocale'])->name('language');

        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings/store', [SettingController::class, 'store'])->name('settings.store');
    });
});


// Frontend

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');

Route::middleware(['check.auth'])->group(function () {
    Route::get('/login', [UserLoginController::class, 'show'])->name('user.login.show');
    Route::post('/login/submit', [UserLoginController::class, 'login'])->name('user.login');

    Route::get('/register', [RegisterController::class, 'show'])->name('user.register.show');
    Route::post('/register/submit', [RegisterController::class, 'register'])->name('user.register');

    Route::get('/auth/google/redirect', [UserLoginController::class, 'redirectToGoogle'])->name('login.google.redirect');
    Route::get('/auth/google/callback', [UserLoginController::class, 'handelGoogleCallback'])->name('login.google.callback');
});

Route::get('/language/{locale}', [SettingController::class, 'changeLocale'])->name('change.locale');

Route::middleware(['auth'])->group(function () {

    Route::get('otp/show', [UserVerifyOtpController::class, 'showPage'])->name('frontend.showotp');
    Route::post('otp/verify', [UserVerifyOtpController::class, 'verifyCode'])->name('frontend.verifyotp');
    Route::get('otp/resend', [LoginController::class, 'generateCode'])->name('frontend.resendotp');
    Route::post('user/logout', [UserLoginController::class, 'logout'])->name('frontend.logout');

    Route::middleware(['otp'])->group(function () {
        Route::get('change/pwd', [UserProfileController::class, 'showChangePwd'])->name('user.change.pwd');
        Route::post('change/pwd', [UserProfileController::class, 'updatePwd'])->name('user.update.pwd');

        Route::get('profile', [UserProfileController::class, 'show'])->name('user.profile');
        Route::post('profile', [UserProfileController::class, 'update'])->name('user.profile.update');

        Route::post('truck/types', [UserOrderController::class, 'types'])->name('user.truck.types');

        Route::get('orders', [UserOrderController::class, 'show'])->name('user.orders');
        Route::get('orders/create', [UserOrderController::class, 'create'])->name('user.orders.create');
        Route::post('orders/calculate', [UserOrderController::class, 'calculate'])->name('user.orders.calculate');

        Route::post('/upload/image', [ImageController::class, 'uploadPhoto'])->name('upload.image');
        Route::post('/remove/image', [ImageController::class, 'removePhoto'])->name('remove.image');
    });
});
