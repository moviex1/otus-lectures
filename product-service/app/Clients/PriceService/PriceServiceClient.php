<?php

declare(strict_types=1);

namespace App\Clients\PriceService;


use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

final readonly class PriceServiceClient
{
    private PendingRequest $client;
    public function __construct()
    {
        $this->client = Http::baseUrl(config('api-services.price-service.base_url'));
    }

    public function getByOrderId(int $orderId): Response
    {
        $response = $this->client->get("/api/prices/$orderId");

        $body = json_decode($response->body(), true);

        return new Response(
            id: $body['id'],
            price: $body['price'],
        );
    }

    public function createPrice(CreatePriceRequest $createPriceRequest): bool
    {
        $response = $this->client->post("/api/prices", [
            'price' => $createPriceRequest->price,
            'productId' => $createPriceRequest->productId,
        ]);

        return $response->status() === \Symfony\Component\HttpFoundation\Response::HTTP_CREATED;
    }
}
