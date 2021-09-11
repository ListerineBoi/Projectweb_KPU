<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/pindah_memilih', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/pindah_memilih/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/pindah_memilih/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pindah_memilih/Surat/Masuk', [App\Http\Controllers\SuratController::class, 'index1'])->name('SuratMasuk');

Route::get('/pindah_memilih/Surat/Keluar', [App\Http\Controllers\SuratController::class, 'index2'])->name('SuratKeluar');
