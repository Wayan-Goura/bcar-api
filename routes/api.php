<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\Api\BookCarController;
use App\Http\Controllers\Api\BookTourController;
use App\Http\Controllers\Api\DashboardController;

/*
|--------------------------------------------------------------------------
| AUTH API
|--------------------------------------------------------------------------
*/
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| PUBLIC API (boleh diakses web / guest)
|--------------------------------------------------------------------------
*/
Route::get('/cars', [CarController::class, 'index']);
Route::get('/cars/{id}', [CarController::class, 'show']);

Route::get('/tours', [TourController::class, 'index']);
Route::get('/tours/{id}', [TourController::class, 'show']);

/*
|--------------------------------------------------------------------------
| PROTECTED API
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->get('/dashboard', [DashboardController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('cars', CarController::class)->except(['index', 'show']);
    Route::apiResource('tours', TourController::class)->except(['index', 'show']);

    Route::apiResource('book-cars', BookCarController::class);
    Route::apiResource('book-tours', BookTourController::class);
});
