<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\UserManagementController;
use App\Http\Controllers\Web\PendataanMobilController;
use App\Http\Controllers\Web\LaporanMobilController;
use App\Http\Controllers\Web\KreditMobilController;
use App\Http\Controllers\Web\MerkController;
use App\Http\Controllers\Web\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/midtrans/callback', [PaymentController::class, 'callback']);

Route::get('/pengguna', [UserManagementController::class, 'index'])->name('pengguna.index');
Route::get('/pengguna/create', [UserManagementController::class, 'create'])->name('pengguna.create');
Route::post('/pengguna', [UserManagementController::class, 'store'])->name('pengguna.store');
Route::get('/pengguna/{id}/edit', [UserManagementController::class, 'edit'])->name('pengguna.edit');
Route::put('/pengguna/{id}', [UserManagementController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/{id}', [UserManagementController::class, 'destroy'])->name('pengguna.destroy');

Route::get('/pendataanmobil', [PendataanMobilController::class, 'index'])->name('pendataanmobil.index');
Route::resource('pendataanmobil', PendataanMobilController::class);
Route::resource('pendataanmobil', App\Http\Controllers\web\PendataanMobilController::class);




Route::get('/laporan-mobil', [LaporanMobilController::class, 'index'])->name('laporanmobil.index');
Route::get('/laporan-mobil/export', [LaporanMobilController::class, 'export'])->name('laporan.mobil.export');


Route::get('kredit-mobil', [KreditMobilController::class, 'index'])->name('kreditmobil.index');
Route::get('kredit-mobil/{id}', [KreditMobilController::class, 'show'])->name('kreditmobil.show');
Route::post('kredit-mobil/{id}/update-status', [KreditMobilController::class, 'updateStatus'])->name('kreditmobil.updateStatus');

Route::get('/dashboard', [App\Http\Controllers\Web\DashboardController::class, 'index'])->name('dashboard');

Route::resource('merek', MerkController::class);
