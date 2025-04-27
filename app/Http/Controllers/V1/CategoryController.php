<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Costa\Package\Controller\Traits\ApiResource;

final class CategoryController extends Controller
{
    use ApiResource;

    protected function model(): string
    {
        return Category::class;
    }

    protected function resource(): string
    {
        return CategoryResource::class;
    }

    protected function allowIncludes(): array
    {
        return [
            'sector',
        ];
    }

    protected function allowFilters(): array
    {
        return [
            'sector_id',
            'department_id',
        ];
    }
}
