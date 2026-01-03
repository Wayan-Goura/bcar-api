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
Route::get('/cars/{car}', [CarController::class, 'show']);

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

     Route::get('/book-cars', [BookCarController::class, 'index']);
    Route::post('/book-cars', [BookCarController::class, 'store']);

    Route::put('/book-cars/{id}/approve', [BookCarController::class, 'approve']);
    Route::put('/book-cars/{id}/complete', [BookCarController::class, 'complete']);
    Route::delete('/book-cars/{id}', [BookCarController::class, 'cancel']);

    Route::delete('/book-tours/{id}', [BookTourController::class, 'cancel']);
    Route::get('/book-tours', [BookTourController::class, 'index']);
    Route::post('/book-tours', [BookTourController::class, 'store']);

    Route::put('/book-tours/{id}/approve', [BookTourController::class, 'approve']);
    Route::put('/book-tours/{id}/complete', [BookTourController::class, 'complete']);

    Route::delete('/book-tours/{id}', [BookTourController::class, 'cancel']);
});
