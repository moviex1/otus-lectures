<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\CalculateInterface;

final readonly class CalculateService implements CalculateInterface
{
    public function add(int $addend1, int $addend2): int
    {
        return $addend1 + $addend2;
    }

    public function subtract(int $minuend, int $subtrahend): int
    {
        return $minuend - $subtrahend;
    }

    public function multiply(int $multiplicand, int $multiplier): int
    {
        return $multiplicand * $multiplier;
    }
}
