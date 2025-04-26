<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Costa\Package\Controller\Traits\ApiResource;

final class SubCategoryController extends Controller
{
    use ApiResource;

    protected function model(): string
    {
        return SubCategory::class;
    }

    protected function resource(): string
    {
        return SubCategoryResource::class;
    }

    protected function allowIncludes(): array
    {
        return [
            'category',
        ];
    }
}
