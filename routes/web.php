<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriBukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);


Route::get('/daftar', [AuthController::class, 'showDaftar']);
Route::post('/daftar', [AuthController::class, 'storeDaftar']);


#############################################
# USER
#############################################
Route::middleware(['auth', 'user-access:user'])->prefix('user')->group(function(){



});

#############################################
# ADMIN
#############################################
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function(){

## KATEGORI #####################
Route::get('/kategori', [KategoriBukuController::class, 'index']);
Route::post('/kategori', [KategoriBukuController::class, 'store']);
Route::put('/kategori/{id}', [KategoriBukuController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriBukuController::class, 'destroy']);
## KATEGORI #####################

## BUKU #####################
Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku', [BukuController::class, 'store']);
Route::put('/buku/{id}', [BukuController::class, 'update']);
Route::delete('/buku/{id}', [BukuController::class, 'destroy']);
## BUKU #####################
});
