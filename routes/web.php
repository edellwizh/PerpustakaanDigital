<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);


Route::get('/daftar', [AuthController::class, 'showDaftar']);
Route::post('/daftar', [AuthController::class, 'storeDaftar']);

Route::post('/logout', [AuthController::class, 'logout']);
#############################################
# USER
#############################################
Route::middleware(['auth', 'user-access:user'])->prefix('user')->group(function(){

## KATALOG BUKU #####################
Route::get('/katalog-buku', [PeminjamanController::class, 'indexUser']);
Route::post('/pinjam', [PeminjamanController::class, 'store']);
## KATALOG BUKU #####################

## BUKU SAYA #####################
Route::get('/buku-saya', [PeminjamanController::class, 'bukuSaya']);
Route::put('/kembali/{id}', [PeminjamanController::class, 'kembaliBuku']);
Route::delete('/buku-saya/{id}', [PeminjamanController::class, 'destroyUser']);
## BUKU SAYA #####################

});

#############################################
# ADMIN
#############################################
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function(){

Route::get('/dashboard', [AuthController::class, 'showDashboard']);

## KATEGORI #####################
Route::get('/kategori', [KategoriBukuController::class, 'index']);
Route::post('/kategori', [KategoriBukuController::class, 'store']);
Route::put('/kategori/{id}', [KategoriBukuController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriBukuController::class, 'destroy']);
## KATEGORI #####################

## BUKU #####################
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku', [BukuController::class, 'store']);
Route::put('/buku/{kode_buku}', [BukuController::class, 'update']);
Route::delete('/buku/{kode_buku}', [BukuController::class, 'destroy']);
## BUKU #####################

## ANGGOTA #####################
Route::get('/anggota', [AuthController::class, 'showAnggota']);
Route::put('/anggota/{id}', [AuthController::class, 'updateAnggota']);
Route::delete('/anggota/{id}', [AuthController::class, 'destroyAnggota']);
## ANGGOTA #####################

## PEMINJAMAN #####################
Route::get('/peminjaman', [PeminjamanController::class, 'indexAdmin']);
Route::put('/kembali/{id}', [PeminjamanController::class, 'kembaliBuku']);
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy']);
## PEMINJAMAN #####################



});
