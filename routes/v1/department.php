<?php

use App\Http\Controllers\V1\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('departments', DepartmentController::class);
