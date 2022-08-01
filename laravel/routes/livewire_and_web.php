<?php

use App\Http\Controllers\Web\MetaDataController;
use App\Http\Controllers\Web\OtherFeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TinyMceEditorController;

Route::middleware('auth')->group(function () {
    // upload image with tinymce editor
    Route::post('tinymce/upload-image', [TinyMceEditorController::class, 'uploadImage'])->name('tinymce.uploadImage');

    Route::prefix('auth')->name('auth.')->group(function() {
        Route::resource('metaData', MetaDataController::class)->except('show', 'destroy');
        Route::get('metaData/{metaData}/update-status', [MetaDataController::class, 'updateStatus'])->name('metaData.updateStatus');
        Route::resource('otherFees', OtherFeeController::class)->except('show');
    });
});
