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
    return redirect()->route('homePublik');
});

Auth::routes();

//publik//
Route::get('/Publik/Home', [App\Http\Controllers\PublikController::class, 'homepub'])->name('homePublik');

    ///pengajuan masuk///
Route::get('/PengajuanSurat/Masuk', [App\Http\Controllers\PublikController::class, 'smpub'])->name('SMPublik');
Route::post('/PengajuanSurat/Masuk/simpan', [App\Http\Controllers\PublikController::class, 'savePengajuan'])->name('simpanM');

    ///pengajuan keluar///
Route::get('/PengajuanSurat/Keluar', [App\Http\Controllers\PublikController::class, 'skpub'])->name('SKPublik');
Route::post('/PengajuanSurat/Keluar/simpan', [App\Http\Controllers\PublikController::class, 'savePengajuanK'])->name('simpanK');

    ///informasi///
Route::get('/Informasi/TPS', [App\Http\Controllers\PublikController::class, 'tps'])->name('tps');
Route::get('/Informasi/TCP', [App\Http\Controllers\PublikController::class, 'tcp'])->name('TCP');

//////////////////////

//admin//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Profil/Admin', [App\Http\Controllers\AdminController::class, 'profiladm'])->name('ProfilAdm');
Route::get('/Setting/Admin', [App\Http\Controllers\AdminController::class, 'setting'])->name('Setting');
Route::get('/DetailSM/Admin', [App\Http\Controllers\AdminController::class, 'detailSM'])->name('DetailSM');
Route::get('/DetailSK/Admin', [App\Http\Controllers\AdminController::class, 'detailSK'])->name('DetailSK');
Route::get('/InputTPS/Admin', [App\Http\Controllers\AdminController::class, 'InputTPS'])->name('InputTPS');
Route::get('/DataTPS/Admin', [App\Http\Controllers\AdminController::class, 'kuotaTPS'])->name('KuotaTPS');

    //surat masuk//
Route::get('/Surat/Masuk', [App\Http\Controllers\AdminController::class, 'index1'])->name('SuratMasuk');
Route::post('/Surat/Masuk/ver', [App\Http\Controllers\AdminController::class, 'verif'])->name('verif');
Route::get('/Input/SM', [App\Http\Controllers\AdminController::class, 'ism'])->name('InputSM');
Route::post('/Input/SM/simpan', [App\Http\Controllers\AdminController::class, 'saveIsm'])->name('saveIsm');
Route::get('/Admin/History/Masuk', [App\Http\Controllers\AdminController::class, 'hisMasuk'])->name('HisMasuk');
Route::get('/Admin/History/Keluar', [App\Http\Controllers\AdminController::class, 'hisKeluar'])->name('HisKeluar');

    //surat keluar//
Route::get('/Surat/Keluar', [App\Http\Controllers\AdminController::class, 'index2'])->name('SuratKeluar');
Route::post('/Surat/Keluar/ver', [App\Http\Controllers\AdminController::class, 'verifK'])->name('verifK');
Route::get('/Input/SK', [App\Http\Controllers\AdminController::class, 'isk'])->name('InputSK');
Route::post('/Input/SK/simpan', [App\Http\Controllers\AdminController::class, 'saveIsk'])->name('saveIsk');

    //informasi admin//
Route::get('/TPS/Admin', [App\Http\Controllers\AdminController::class, 'tpsadm'])->name('tpsadmin');

//fetch//
Route::get('/fetch/fetchkabkot', [App\Http\Controllers\FetchController::class, 'fetchkabkot'])->name('fetchkabkot');
Route::get('/fetch/fetchkec', [App\Http\Controllers\FetchController::class, 'fetchkec'])->name('fetchkec');
Route::get('/fetch/fetchkeldes', [App\Http\Controllers\FetchController::class, 'fetchkeldes'])->name('fetchkeldes');
Route::get('/fetch/fetchtps', [App\Http\Controllers\FetchController::class, 'fetchtps'])->name('fetchtps');