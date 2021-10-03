<?php

use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\VerificationController;
use App\Http\Controllers\Api\User\ChangePasswordController;
use App\Http\Controllers\Api\User\PrivateMessageController;
use App\Http\Controllers\Api\User\ProfileController;
use App\Http\Controllers\Api\User\RequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:api'], function () {
//    Route::get('user', 'Auth\AuthController@user');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('website.api.user.change_password');

    Route::get('/private-message/', [PrivateMessageController::class, 'index'])->name('website.api.user.private_message.index');
    Route::get('/private-message/{uuid}/', [PrivateMessageController::class, 'show'])->name('website.api.user.private_message.show');

    Route::get('/logout', '\Api\Auth\LogoutController@logout')->name('website.api.auth.logout');

    Route::prefix('/profile')->group(function () {
        Route::get('/{profile}', [ProfileController::class, 'show'])->name('website.api.profile.show');
        Route::post('/', [ProfileController::class, 'store'])->name('website.api.profile.store');
        Route::patch('/{profile}', [ProfileController::class, 'update'])->name('website.api.profile.update');
    })
    ;

    Route::post('/change-password', 'App\Http\Controllers\Api\User\ChangePasswordController@changePassword')->name('website.api.user.change_password');
    Route::get('/balance', 'App\Http\Controllers\Api\User\WalletController@getWallets')->name('website.api.user.get_wallets');
    Route::prefix('request')->group(function () {
        Route::get('/', [RequestController::class, 'index'])->name('website.api.user.index');
        Route::post('/store', [RequestController::class, 'storeRequest'])->name('website.api.user.store_request');
        Route::post('/{requestModel}/update', [RequestController::class, 'updateRequest'])->name('website.api.user.update_request');

    })
    ;
    Route::get('/logout', [LogoutController::class, 'logout'])->name('website.api.auth.logout');
});


Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {

    Route::post('/verify/', [VerificationController::class, 'check'])->name('website.api.auth.verification');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendForgotPasswordLink'])->name('website.api.auth.send_forgot_password_link');
    Route::get('/forgot-password/{code}', [ForgotPasswordController::class, 'checkForgotPasswordLink'])->name('website.api.auth.check_forgot_password_link')->where(['code' => '.*']);
    Route::post('/forgot-password/{code}', [ForgotPasswordController::class, 'changePassword'])->name('website.api.auth.change_password')->where(['code' => '.*']);

    Route::post('/register', [RegisterController::class, 'register'])->name('website.api.auth.register');
    Route::post('/login', [LoginController::class, 'login'])->name('website.api.auth.login');

});

