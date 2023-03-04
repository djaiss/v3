<?php

use App\Domains\Auth\Web\Controllers\EmailVerificationNotificationController;
use App\Domains\Auth\Web\Controllers\EmailVerificationPromptController;
use App\Domains\Auth\Web\Controllers\LoginController;
use App\Domains\Auth\Web\Controllers\RegisterController;
use App\Domains\Auth\Web\Controllers\VerifyEmailController;
use App\Domains\Home\Web\Controllers\HomeController;
use App\Domains\Settings\ManageCompany\Web\Controllers\CreateCompanyController;
use App\Domains\Settings\ManageCompany\Web\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('login', [LoginController::class, 'create'])->name('login.create');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('logout', [LoginController::class, 'destroy'])->name('logout');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome.index');
    Route::get('create', [CreateCompanyController::class, 'index'])->name('create_company.index');
    Route::post('create', [CreateCompanyController::class, 'store'])->name('create_company.store');

    Route::middleware(['company'])->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home.index');
    });
});
