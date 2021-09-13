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

Route::get('/Publik/Home', [App\Http\Controllers\PublikController::class, 'homepub'])->name('homePublik');

Route::get('/PengajuanSurat/Masuk', [App\Http\Controllers\PublikController::class, 'smpub'])->name('SMPublik');

Route::get('/Informasi/TPS', [App\Http\Controllers\PublikController::class, 'tps'])->name('tps');

Route::get('/Informasi/TCP', [App\Http\Controllers\PublikController::class, 'tcp'])->name('TCP');

Route::get('/Input/SM', [App\Http\Controllers\SuratController::class, 'ism'])->name('InputSM');

Route::get('/TPS/Admin', [App\Http\Controllers\SuratController::class, 'tpsadm'])->name('tpsadmin');
