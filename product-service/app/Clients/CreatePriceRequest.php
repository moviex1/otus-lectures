<?php

declare(strict_types=1);

namespace App\Clients;

final readonly class CreatePriceRequest
{
    public function __construct(
        public float $price,
        public int $productId,
    )
    {
    }
}
