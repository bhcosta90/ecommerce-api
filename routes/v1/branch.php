<?php

declare(strict_types = 1);

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

Route::apiResource('branches', BranchController::class);
