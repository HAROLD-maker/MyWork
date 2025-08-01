<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SliderController;

Route::apiResource('users', UserController::class);
Route::apiResource('sliders', SliderController::class);

// Endpoints para filtros y búsqueda avanzada
Route::get('users/search', [UserController::class, 'search']);
Route::get('sliders/active', [SliderController::class, 'active']); 