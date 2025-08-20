<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KreditMobilController;

// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes (butuh token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('users', App\Http\Controllers\Api\UserController::class);
    Route::apiResource('merks', App\Http\Controllers\Api\MerkController::class);
    Route::apiResource('tipes', App\Http\Controllers\Api\TipeController::class);
    Route::apiResource('mobils', App\Http\Controllers\Api\MobilController::class);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::post('/kredit-mobil', [KreditMobilController::class, 'store']);
Route::get('/kredit-mobil', [KreditMobilController::class, 'index']);
