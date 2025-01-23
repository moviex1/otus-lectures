<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/callback', function (Request $request) {
    $response = Http::asForm()->post('http://localhost:8000/oauth/token', [
        'grant_type' => 'authorization_code',
        'client_id' => '3',
        'client_secret' => 'sp54sA9QRTzEiOz8k4HduStN1gnZCDyO2KcPoPOK',
        'redirect_uri' => 'http://localhost:8000/auth/callback',
        'code' => $request->code,
    ]);

    return $response->json();
});

Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
