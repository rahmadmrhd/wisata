<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'getLaporan'])->name('laporan');
