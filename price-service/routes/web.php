<?php

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/prices/{productId}', function (int $productId) {
    $price = Price::query()
        ->where('product_id', $productId)
        ->get()
        ->first();

    if ($price === null ) {
        return response(status: 404);
    }

    return $price;
});

Route::post('/api/prices', function (Request $request) {
    return Price::query()->create([
        'price' => $request->get('price'),
        'product_id' => $request->get('productId')
    ]);
});
