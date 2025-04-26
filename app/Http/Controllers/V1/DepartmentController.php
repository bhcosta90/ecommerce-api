<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Costa\Package\Controller\Traits\ApiResource;

final class DepartmentController extends Controller
{
    use ApiResource;

    protected function model(): string
    {
        return Department::class;
    }

    protected function resource(): string
    {
        return DepartmentResource::class;
    }

    protected function allowIncludes(): array
    {
        return [
            'sectors',
        ];
    }
}
