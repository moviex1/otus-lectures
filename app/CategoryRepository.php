<?php

declare(strict_types=1);

namespace App;

use App\Models\Category;

final readonly class CategoryRepository
{
    public function findByFields(array $filters): array
    {
        $builder = Category::query();

        if ($filters['name'] !== null) {
            $builder->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if ($filters['orderBy'] !== null && $filters['direction'] !== null) {
            $builder->orderBy($filters['orderBy'], $filters['direction']);
        }

        return $builder->get()->toArray();
    }
}
