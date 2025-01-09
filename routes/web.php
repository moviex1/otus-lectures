<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World1';
});

Route::get('/bye', function () {
    return 'bye';
});

Route::get('/bye2', function () {
    return 'asdf';
});
