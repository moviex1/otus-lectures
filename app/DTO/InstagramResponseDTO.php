<?php

declare(strict_types=1);

namespace App\DTO;

final readonly class InstagramResponseDTO
{
    public function __construct(
        public string $name,
        public string $avatarLink,
        public string $bio,
    )
    {
    }
}
