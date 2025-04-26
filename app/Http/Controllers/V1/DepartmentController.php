<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Costa\Package\Controller\AsApiResource;

class DepartmentController extends Controller
{
    use AsApiResource;

    protected function model(): string
    {
        return Department::class;
    }

    protected function resource(): string
    {
        return DepartmentResource::class;
    }
}
