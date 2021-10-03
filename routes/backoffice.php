<?php

use App\Http\Controllers\Backoffice\AnnouncementController;
use App\Http\Controllers\Backoffice\PrivateMessageController;
use App\Http\Controllers\Backoffice\RequestController;
use App\Http\Controllers\Backoffice\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Backoffice'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('', [UserController::class, 'indexAction'])->name('backoffice_user_index');
        Route::get('/edit/{user}', [UserController::class, 'editAction'])->name('backoffice_user_edit_page');
        Route::get('/{user}', [UserController::class, 'showAction'])->name('backoffice_user_show_information');
        Route::patch('/{user}', [UserController::class, 'updateAction'])->name('backoffice_user_update');
        Route::patch('/verify/{user}', [UserController::class, 'verifyAction'])->name('backoffice_user_verification');
        Route::get('/documents/{user}', [UserController::class, 'documentsAction'])->name('backoffice_user_documents');
    });


    Route::group(['prefix' => 'request'], function () {

        Route::get('/', [RequestController::class, 'index'])->name('backoffice.request.index');
        Route::post('/{request}/accept', [RequestController::class, 'acceptAction'])->name('backoffice.change_status.acceptAction');
        Route::post('/{request}/reject', [RequestController::class, 'rejectAction'])->name('backoffice.change_status.rejectAction');
        Route::get('/{request}/show', [RequestController::class, 'showAction'])->name('backoffice.request.show');
    });

    Route::group(['prefix' => 'announcement'], function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('backoffice.announcement.index');
        Route::post('/store', [AnnouncementController::class, 'storeAction'])->name('backoffice.announcement.store');
        Route::get('/create', [AnnouncementController::class, 'createAction'])->name('backoffice.announcement.create');
        Route::get('/edit/{announcement}', [AnnouncementController::class, 'editAction'])->name('backoffice.announcement.edit');
        Route::patch('/update/{announcement}', [AnnouncementController::class, 'updateAction'])->name('backoffice.announcement.update');
        Route::delete('/{announcement}', [AnnouncementController::class, 'deleteAction'])->name('backoffice.announcement.delete');
    });

    Route::group(['prefix' => 'private-message'], function () {
        Route::get('/', [PrivateMessageController::class, 'indexAction'])->name('backoffice.private_message.index');
        Route::get('/create', [PrivateMessageController::class, 'createAction'])->name('backoffice.private_message.create');
        Route::post('/', [PrivateMessageController::class, 'storeAction'])->name('backoffice.private_message.store');
        Route::get('/edit/{message}', [PrivateMessageController::class, 'editAction'])->name('backoffice.private_message.edit');
        Route::patch('/{message}', [PrivateMessageController::class, 'updateAction'])->name('backoffice.private_message.update');
        Route::delete('/{message}', [PrivateMessageController::class, 'deleteAction'])->name('backoffice.private_message.delete');
    });
});
