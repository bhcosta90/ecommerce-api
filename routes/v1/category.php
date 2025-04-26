<?php

declare(strict_types = 1);

use App\Http\Controllers\V1\CategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class);
