<?php

declare(strict_types=1);

namespace App\Clients\ShopService;


use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

final readonly class ShopServiceClient
{
    private PendingRequest $client;
    public function __construct()
    {
        $this->client = Http::baseUrl(config('api-services.shop-service.base_url'));
    }

    public function getById(int $shopId): ?Response
    {
        $response = $this->client->get("/api/shops/$shopId");

        if ($response->status() !== 200) {
            return null;
        }

        $body = json_decode($response->body(), true);

        return new Response(
            id: $body['id'],
            name: $body['name'],
        );
    }
}
