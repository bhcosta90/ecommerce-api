<?php

declare(strict_types = 1);

use App\Http\Controllers\V1\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('sub-categories', SubCategoryController::class);
