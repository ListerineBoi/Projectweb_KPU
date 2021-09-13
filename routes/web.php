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

Route::get('/Surat/Masuk', [App\Http\Controllers\SuratController::class, 'index1'])->name('SuratMasuk');

Route::get('/Surat/Keluar', [App\Http\Controllers\SuratController::class, 'index2'])->name('SuratKeluar');
