<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KreditMobilController;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MerkController;
use App\Http\Controllers\Api\TipeController;
use App\Http\Controllers\Api\MobilController;

// --------------------
// Public routes
// --------------------
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Midtrans callback (public, tidak pakai sanctum)
Route::post('/midtrans/callback', [PembayaranController::class, 'callback']);

// --------------------
// Protected routes (butuh token Sanctum)
// --------------------
Route::middleware('auth:sanctum')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Profil user login
    Route::get('/user', fn(Request $request) => $request->user());

    // Resource utama
    Route::apiResource('users', UserController::class);
    Route::apiResource('merks', MerkController::class);
    Route::apiResource('tipes', TipeController::class);
    Route::apiResource('mobils', MobilController::class);

    // Kredit mobil
    Route::get('/kredit-mobil', [KreditMobilController::class, 'index']);
    Route::post('/kredit-mobil', [KreditMobilController::class, 'store']);

    // Pembayaran mobil
    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'show']);
    Route::post('/kredit/{id}/pembayaran', [PembayaranController::class, 'store']);
    Route::post('/pembayaran/{id}/pay', [PembayaranController::class, 'createTransaction']);
});
