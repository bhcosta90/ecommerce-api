<?php

declare(strict_types = 1);

use App\Http\Controllers\V1\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::apiResource('departments', DepartmentController::class);
