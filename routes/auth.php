<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;

Route::middleware(['guest:'.config('fortify.guard')])->group(function () {
    Route::get('forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password.index');
    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot-password.store');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'index'])->name('reset-password.index');
    Route::post('reset-password/resend', [ResetPasswordController::class, 'resend'])
        ->name('reset-password.resend');
    Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('reset-password.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('verify', [VerificationController::class, 'index'])->name('verify.index');
    Route::post('verify/resend', [VerificationController::class, 'resend'])->name('verify.resend');
    Route::post('verify', [VerificationController::class, 'store'])->name('verify.store');
    Route::put('verify', [VerificationController::class, 'update'])->name('verify.update');
});
