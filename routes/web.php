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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


<<<<<<< HEAD
=======
Route::get('/pindah_memilih/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pindah_memilih/Surat/Masuk', [App\Http\Controllers\SuratController::class, 'index1'])->name('SuratMasuk');

Route::get('/pindah_memilih/Surat/Keluar', [App\Http\Controllers\SuratController::class, 'index2'])->name('SuratKeluar');
>>>>>>> b38b57cb1aefe73755a3404aa0cd6f36f36209dd
