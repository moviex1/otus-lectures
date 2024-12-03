<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/download', [FileController::class, 'download'])->name('download.file');
Route::post('/upload', [FileController::class, 'upload'])->name('upload.file');
