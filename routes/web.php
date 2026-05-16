<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/beranda', [UserController::class, 'index']);
Route::get('/detail-film/{id}', [UserController::class, 'show']);

Route::get('/pesan/{id}', [UserController::class, 'pesan']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['ceklogin'])->group(function () {

    Route::get('/film', [FilmController::class, 'index']);
    Route::get('/film/create', [FilmController::class, 'create']);
    Route::post('/film', [FilmController::class, 'store']);
    Route::get('/film/{id}', [FilmController::class, 'show']);
    Route::get('/film/{id}/edit', [FilmController::class, 'edit']);
    Route::put('/film/{id}', [FilmController::class, 'update']);
    Route::delete('/film/{id}', [FilmController::class, 'destroy']);

    Route::get('/pembeli', [PembeliController::class, 'index']);
    Route::get('/pembeli/create', [PembeliController::class, 'create']);
    Route::post('/pembeli', [PembeliController::class, 'store']);
    Route::get('/pembeli/{id}/edit', [PembeliController::class, 'edit']);
    Route::put('/pembeli/{id}', [PembeliController::class, 'update']);
    Route::delete('/pembeli/{id}', [PembeliController::class, 'destroy']);

    Route::get('/tiket', [TiketController::class, 'index']);
    Route::get('/tiket/create', [TiketController::class, 'create']);
    Route::post('/tiket', [TiketController::class, 'store']);
    Route::get('/tiket/{id}/edit', [TiketController::class, 'edit']);
    Route::put('/tiket/{id}', [TiketController::class, 'update']);
    Route::delete('/tiket/{id}', [TiketController::class, 'destroy']);

    Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
    Route::post('/pembayaran', [PembayaranController::class, 'store']);
    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit']);
    Route::put('/pembayaran/{id}', [PembayaranController::class, 'update']);
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy']);

    Route::get('/pembayaran/{id}/tiket', [PembayaranController::class, 'tiket']);

    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/create', [AdminController::class, 'create']);
    Route::post('/admin', [AdminController::class, 'store']);
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/{id}', [AdminController::class, 'update']);
    Route::delete('/admin/{id}', [AdminController::class, 'destroy']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/pembayaran/{id}/bayar', [PembayaranController::class, 'bayar']);
});

Route::get('/register-pembeli', [UserController::class, 'register']);
Route::post('/register-pembeli', [UserController::class, 'storeRegister']);

Route::get('/login-pembeli', [UserController::class, 'loginPembeli']);
Route::post('/login-pembeli', [UserController::class, 'prosesLoginPembeli']);

Route::get('/logout-pembeli', [UserController::class, 'logoutPembeli']);

Route::get('/tiket-saya', [UserController::class, 'tiketSaya']);

Route::get('/pembayaran/{id}/tiket', [PembayaranController::class, 'tiket']);

Route::get('/pembayaran-user/{id}', [UserController::class, 'pilihPembayaran']);
Route::post('/pembayaran-user/{id}', [UserController::class, 'prosesPembayaran']);

Route::get('/tiket-saya/{id}/eticket', [UserController::class, 'eticket']);

Route::post('/pesan-tiket', [UserController::class, 'simpanTiket']);