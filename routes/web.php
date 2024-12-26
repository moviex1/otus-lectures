<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/create-tasks-sync', [TaskController::class, 'sync']);
Route::post('/create-tasks-database', [TaskController::class, 'database']);
Route::post('/create-tasks-redis', [TaskController::class, 'redis']);
Route::post('/run-batches', [TaskController::class, 'batches']);
Route::post('/after-response', [TaskController::class, 'afterResponse']);
Route::post('/delay', [TaskController::class, 'delay']);
