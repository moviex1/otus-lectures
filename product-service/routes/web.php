<?php

use App\Clients\CreatePriceRequest;
use App\Clients\PriceServiceClient;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/products/{productId}', function (int $productId, PriceServiceClient $priceServiceClient) {
    $product = Product::query()->findOrFail($productId);

    $price = $priceServiceClient->getByOrderId($productId);

    return [
        'id' => $product->id,
        'name' => $product->name,
        'price' => $price->price,
    ];
});

Route::post('/api/products', function (Request $request, PriceServiceClient $priceServiceClient) {
    $product = Product::query()->create([
        'name' => $request->get('name'),
    ]);

    $result = $priceServiceClient->createPrice(new CreatePriceRequest(
        price: $request->get('price'),
        productId: $product->id
    ));

    return [
        'success' => $result,
    ];
});
