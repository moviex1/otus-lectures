<?php

declare(strict_types=1);

namespace App\Clients\ShopService;

final readonly class Response
{
    public function __construct(
        public int $id,
        public string $name,
    )
    {
    }
}
