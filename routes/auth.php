<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;

Route::group(['prefix' => 'auth'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/', [AuthenticationController::class, 'index'])->name('website.web.user.auth');

        Route::post('/register', [RegisteredUserController::class, 'store'])
             ->name('website.web.auth.register')
        ;

        Route::post('/login', [AuthenticatedSessionController::class, 'store'])
             ->name('website.web.auth.login')
        ;

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
             ->name('password.request')
        ;

        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
             ->name('password.email')
        ;

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
             ->name('password.reset')
        ;

        Route::group(['middleware' => ['throttle:100,10']], function (){
            Route::post('/forgot-password', [ForgotPasswordController::class, 'sendForgotPasswordLink'])->name('website.web.auth.send_forgot_password_link');
            Route::get('/forgot-password/{code}', [ForgotPasswordController::class, 'checkForgotPasswordLink'])->name('website.web.auth.check_forgot_password_link')->where(['code' => '.*']);
            Route::post('/forgot-password/{code}', [ForgotPasswordController::class, 'changePassword'])->name('website.web.auth.change_password')->where(['code' => '.*']);
        });

        Route::post('/reset-password', [NewPasswordController::class, 'store'])
             ->name('password.update')
        ;
    });


    Route::group(['middleware' => ['auth']], function () {

        Route::get('/verify-email', [VerificationController::class, 'index'])
             ->name('website.web.auth.verification.index')
        ;
        Route::post('/verify-email', [VerificationController::class, 'check'])
             ->name('website.web.auth.verification.check')
        ;

        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
             ->name('password.confirm')
        ;

        Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ;

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
             ->name('logout')
        ;
    });
});
