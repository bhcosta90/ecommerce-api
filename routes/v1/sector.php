<?php

declare(strict_types = 1);

use App\Http\Controllers\V1\SectorController;
use Illuminate\Support\Facades\Route;

Route::apiResource('sectors', SectorController::class);
