<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PrivateMessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('auth');
})->name('welcome')
;

Route::group(
    [
        'middleware' => 'rbac',
        'prefix'     => 'backoffice',
    ],
    base_path('routes/backoffice.php'));

Route::group(['prefix' => 'user/profile', 'middleware' => ['email.verified', 'auth']], function () {
    Route::get('/', [ProfileController::class, 'show'])->name('website.web.user.profile.show');
    Route::patch('/edit/{profile}', [ProfileController::class, 'update'])->name('website.web.user.profile.update');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['email.verified','auth']);

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'email.verified', 'complete.profile']], function () {


    Route::get('/user-profile/upload', function () {
        return view('user.user-profile.upload');
    })->name('user.user-profile.upload')
    ;

    Route::get('/user-profile/bank-account', function () {
        return view('user.user-profile.bank-account');
    })->name('user.user-profile.bank-account')
    ;
    Route::group(['prefix' => 'document'], function () {
        Route::get('/', [DocumentController::class, 'index'])->name('website.web.user.document.show');
        Route::get('/create', [DocumentController::class, 'create'])->name('website.web.user.document.index');
        Route::post('/upload', [DocumentController::class, 'upload'])->name('website.web.user.document.upload');
    });

    Route::get('/private-message/{uuid}', [PrivateMessageController::class, 'show'])->name('website.web.user.private_message');

    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('website.web.user.change_password.index');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('website.web.user.change_password');

    Route::group(['prefix' => 'request'], function () {
        Route::get('/', [RequestController::class, 'index'])->name('website.web.user.request.index');
        Route::get('/show/{request}', [RequestController::class, 'show'])->name('website.web.user.request.show');
        Route::get('/create', [RequestController::class, 'create'])->name('website.web.user.request.create');
        Route::post('/store', [RequestController::class, 'store'])->name('website.web.user.request.store');
        Route::get('/edit/{request}', [RequestController::class, 'edit'])->name('website.web.user.request.edit');
        Route::patch('/edit/{request}', [RequestController::class, 'update'])->name('website.web.user.request.update');
    });

    Route::group(['prefix' => 'e-account'], function () {
        Route::get('/', [\App\Http\Controllers\ExternalAccountController::class, 'index'])->name('website.web.external_account.index');
        Route::get('/demo-create', [\App\Http\Controllers\ExternalAccountController::class, 'demoCreate'])->name('website.web.external_account.demo_create');
        Route::get('/real-create', [\App\Http\Controllers\ExternalAccountController::class, 'realCreate'])->name('website.web.external_account.real_create');
        Route::post('/demo', [\App\Http\Controllers\ExternalAccountController::class, 'demoStore'])->name('website.web.external_account.demo_store');
        Route::post('/real', [\App\Http\Controllers\ExternalAccountController::class, 'realStore'])->name('website.web.external_account.real_store');
    });
});

include "auth.php";
