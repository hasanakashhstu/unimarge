<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TinyMceEditorController;

// upload image with tinymce editor
Route::post('tinymce/upload-image', [TinyMceEditorController::class, 'uploadImage'])->name('tinymce.uploadImage');