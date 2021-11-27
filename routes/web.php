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
Route::get('/Informasi/DataTPS', [App\Http\Controllers\PublikController::class, 'kuotaTPSPub'])->name('kuotaTPSPub');

//////////////////////

//admin//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Profil/Admin', [App\Http\Controllers\AdminController::class, 'profiladm'])->name('ProfilAdm');
Route::get('/Setting/Admin', [App\Http\Controllers\AdminController::class, 'setting'])->name('Setting');
Route::post('/Setting/simpan_Admin', [App\Http\Controllers\AdminController::class, 'saveAdmin'])->name('saveAdmin');
Route::get('/Setting/del_Admin/{id}', [App\Http\Controllers\AdminController::class, 'deladmin'])->name('deladmin');
Route::get('/DetailSM/Admin/{id}', [App\Http\Controllers\AdminController::class, 'detailSM'])->name('DetailSM');
Route::get('/DetailSK/Admin/{id}', [App\Http\Controllers\AdminController::class, 'detailSK'])->name('DetailSK');
Route::get('/InputTPS/Admin', [App\Http\Controllers\AdminController::class, 'InputTPS'])->name('InputTPS');
Route::get('/editTPS/Admin/{id}', [App\Http\Controllers\AdminController::class, 'editTPS'])->name('editTPS');
Route::get('/delTPS/Admin/{id}', [App\Http\Controllers\AdminController::class, 'delTPS'])->name('delTPS');
Route::post('/InputTPS/Admin/savetps', [App\Http\Controllers\AdminController::class, 'savetps'])->name('savetps');
Route::post('/InputTPS/Admin/importtps', [App\Http\Controllers\AdminController::class, 'importtps'])->name('importtps');
Route::post('/InputTPS/Admin/savetpsEdit', [App\Http\Controllers\AdminController::class, 'savetpsEdit'])->name('savetpsEdit');
Route::get('/DataTPS/Admin', [App\Http\Controllers\AdminController::class, 'kuotaTPS'])->name('KuotaTPS');

    //surat masuk//
Route::get('/Surat/Masuk/Admin', [App\Http\Controllers\AdminController::class, 'pilihansm'])->name('pilihansm');
Route::get('/Surat/Masuk/editpengajuan/{$id}', [App\Http\Controllers\AdminController::class, 'editpengajuan'])->name('editpengajuan');
Route::post('/Surat/Masuk/ver', [App\Http\Controllers\AdminController::class, 'verif'])->name('verif');
Route::get('/Surat/Masuk/', [App\Http\Controllers\AdminController::class, 'index1'])->name('SuratMasuk');
Route::get('/Input/SM', [App\Http\Controllers\AdminController::class, 'ism'])->name('InputSM');
Route::post('/Input/SM/simpan', [App\Http\Controllers\AdminController::class, 'saveIsm'])->name('saveIsm');
Route::get('/Admin/History/Masuk', [App\Http\Controllers\AdminController::class, 'hisMasuk'])->name('HisMasuk');
Route::get('/Admin/FollowUp/Masuk', [App\Http\Controllers\AdminController::class, 'fuMasuk'])->name('FUMasuk');
Route::post('/Admin/FollowUp/Masuk/verif', [App\Http\Controllers\AdminController::class, 'verifFuMasuk'])->name('verifFuMasuk');
Route::get('/printpdf/{id}', [App\Http\Controllers\AdminController::class, 'printpdf'])->name('printpdf');

    //surat keluar//
Route::get('/Surat/Keluar/', [App\Http\Controllers\AdminController::class, 'index2'])->name('SuratKeluar');
Route::post('/Surat/Keluar/ver', [App\Http\Controllers\AdminController::class, 'verifK'])->name('verifK');
Route::get('/Input/SK', [App\Http\Controllers\AdminController::class, 'isk'])->name('InputSK');
Route::post('/Input/SK/simpan', [App\Http\Controllers\AdminController::class, 'saveIsk'])->name('saveIsk');
Route::get('/Admin/History/Keluar', [App\Http\Controllers\AdminController::class, 'hisKeluar'])->name('HisKeluar');
Route::get('/Admin/FollowUp/Keluar', [App\Http\Controllers\AdminController::class, 'fuKeluar'])->name('FUKeluar');
Route::post('/Admin/FollowUp/Keluar/verif', [App\Http\Controllers\AdminController::class, 'verifFuKeluar'])->name('verifFuKeluar');
Route::get('/printpdfK/{id}', [App\Http\Controllers\AdminController::class, 'printpdfK'])->name('printpdfK');


    //informasi admin//
Route::get('/TPS/Admin', [App\Http\Controllers\AdminController::class, 'tpsadm'])->name('tpsadmin');


//fetch//
Route::get('/fetch/fetchkabkot', [App\Http\Controllers\FetchController::class, 'fetchkabkot'])->name('fetchkabkot');
Route::get('/fetch/fetchkec', [App\Http\Controllers\FetchController::class, 'fetchkec'])->name('fetchkec');
Route::get('/fetch/fetchkeldes', [App\Http\Controllers\FetchController::class, 'fetchkeldes'])->name('fetchkeldes');
Route::get('/fetch/fetchtps', [App\Http\Controllers\FetchController::class, 'fetchtps'])->name('fetchtps');