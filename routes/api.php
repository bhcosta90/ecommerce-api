<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    include __DIR__ . '/v1/auth.php';
    Route::middleware('auth:sanctum')->group(function () {
        include __DIR__ . '/v1/department.php';

        include __DIR__ . '/v1/sector.php';

        include __DIR__ . '/v1/user.php';
    });
});
