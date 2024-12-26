<?php

declare(strict_types=1);

namespace App\Contracts;

interface CalculateInterface
{
    public function add(int $addend1, int $addend2): int;

    public function subtract(int $minuend, int $subtrahend): int;

    public function multiply(int $multiplicand, int $multiplier): int;
}
