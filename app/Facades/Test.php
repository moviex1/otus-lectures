<?php

declare(strict_types=1);

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string test()
 */
final class Test extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'test';
    }
}
