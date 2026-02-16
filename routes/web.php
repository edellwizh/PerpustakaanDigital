<?php

use App\Http\Controllers\AuthController;
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
Route::middleware(['auth', 'user-acces:user'])->prefix('user')->group(function(){
Route::get('/dashboard', [AuthController::class, 'showDashboard']);


});

#############################################
# ADMIN
#############################################
Route::middleware(['auth', 'user-acces:admin'])->prefix('admin')->group(function(){

});
