<?php

declare(strict_types=1);

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static int add(int $addend1, int $addend2)
 * @method static int subtract(int $minuend, int $subtrahend)
 * @method static int multiply(int $multiplicand, int $multiplier)
 */
final class Calc extends Facade
{
    public const Accessor = 'calc';
    protected static function getFacadeAccessor(): string
    {
        return self::Accessor;
    }
}
