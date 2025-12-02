<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;

Auth::routes();

// Route default ke diagnosa
Route::get('/', [DiagnosaController::class, 'index'])->name('home');

// Semua fitur hanya untuk user login
Route::middleware(['auth'])->group(function () {
    // Diagnosa
    Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
    Route::post('/diagnosa/hasil', [DiagnosaController::class, 'hasil'])->name('diagnosa.hasil');

    // Gejala
    Route::get('/gejala', [GejalaController::class, 'index'])->name('gejala.index');
    Route::post('/gejala', [GejalaController::class, 'store'])->name('gejala.store');
    Route::get('/gejala/{id}/edit', [GejalaController::class, 'edit'])->name('gejala.edit');
    Route::put('/gejala/{id}', [GejalaController::class, 'update'])->name('gejala.update');
    Route::delete('/gejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');
});
