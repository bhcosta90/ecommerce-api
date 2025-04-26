<?php

declare(strict_types = 1);

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SectorResource;
use App\Models\Sector;
use Costa\Package\Controller\Traits\ApiResource;

final class SectorController extends Controller
{
    use ApiResource;

    protected function model(): string
    {
        return Sector::class;
    }

    protected function resource(): string
    {
        return SectorResource::class;
    }

    protected function allowIncludes(): array
    {
        return [
            'department',
        ];
    }
}
