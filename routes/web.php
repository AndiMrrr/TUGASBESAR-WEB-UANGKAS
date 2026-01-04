<?php

use App\Http\Controllers\KasController;
use Illuminate\Support\Facades\Route;

// Redirect root ke kas
Route::get('/', function () {
    return redirect()->route('kas.index');
});

// Routes untuk Kas
Route::resource('kas', KasController::class);
Route::get('/kas-laporan', [KasController::class, 'laporan'])->name('kas.laporan');