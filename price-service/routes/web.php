<?php

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/prices/{productId}', function (int $productId) {
    return Price::query()
        ->findOrFail($productId);
});

Route::post('/api/prices', function (Request $request) {
    return Price::query()->create([
        'price' => $request->get('price'),
        'product_id' => $request->get('productId')
    ]);
});
