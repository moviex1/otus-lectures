<?php

declare(strict_types=1);

namespace App\Contracts;

use App\DTO\InstagramResponseDTO;

interface ApiInstagramInterface
{
    public function getProfile(string $name): InstagramResponseDTO;
}
