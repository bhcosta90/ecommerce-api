<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Resources\BranchResource;
use App\Models\Branch;
use Costa\Package\Controller\Traits\ApiResource;

final class BranchController extends Controller
{
    use ApiResource;

    protected function model(): string
    {
        return Branch::class;
    }

    protected function resource(): string
    {
        return BranchResource::class;
    }
}
