<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::middleware('guest')->controller(App\Http\Controllers\AuthController::class)->group(function () {
  Route::get('login', 'login')->name('login');
  Route::get('register', 'register')->name('register');
  Route::post('login', 'authenticate')->name('login');
  Route::post('register', 'store')->name('register');
});

Route::middleware('auth')->group(function () {
  Route::delete('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

  Route::resource('pengunjungs', App\Http\Controllers\PengunjungController::class);
  Route::resource('tempat_wisatas', App\Http\Controllers\TempatWisataController::class);
  Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');
});

Route::get('/dashboard', function () {
  return redirect('/pengunjungs');
});
