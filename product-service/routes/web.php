<?php

use App\Clients\PriceService\CreatePriceRequest;
use App\Clients\PriceService\PriceServiceClient;
use App\Clients\ShopService\ShopServiceClient;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/products/{productId}', function (int $productId, PriceServiceClient $priceServiceClient, ShopServiceClient $shopServiceClient) {
    $product = Product::query()->findOrFail($productId);

    $price = $priceServiceClient->getByOrderId($productId);
    $shop = null;
    if ($product->shop_id !== null) {
        $shop = $shopServiceClient->getById($product->shop_id);
    }

    return [
        'id' => $product->id,
        'name' => $product->name,
        'price' => $price->price,
        'shop' => $shop?->name,
    ];
});

Route::post('/api/products', function (Request $request, PriceServiceClient $priceServiceClient) {
    $product = Product::query()->create([
        'name' => $request->get('name'),
        'shop_id' => $request->get('shopId'),
    ]);

    $result = $priceServiceClient->createPrice(new CreatePriceRequest(
        price: $request->get('price'),
        productId: $product->id,
    ));

    return [
        'success' => $result,
    ];
});
