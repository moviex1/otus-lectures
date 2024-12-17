<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;

final readonly class CategoryService
{
    public function findAllByName(string $name)
    {
        return Category::whereLike('name', "%{$name}%")->pluck('name')->all();
    }
}
