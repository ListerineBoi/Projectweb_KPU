@extends('layouts.nav')

@section('content') 

<div class="container">
<div class="col-12 align-items-center">
<div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    <h1 class="display-4">Halo! User!</h1>
    <p class="lead">Kamu Sudah Berhasil Login Ke Sistem Pindah Pemilih KPU Kota Yogyakarta :)</p>
  </div>
</div>
</div>
</div>

<div class="container">
<div class="col-12 align-items-center">
<div class="row m-2">
  <div class="col-sm-6 mb-4">
    <div class="card text-center">
    <img class="card-img-top" src="/image/rumahtps.jpg" width="200" height="200"  alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">TPS</h5>
        <p class="card-text">Digunakan untuk melihat, menambah dan mengubah data TPS di tiap Kelurahan di Kota Yogyakarta.</p>
        <a href="{{route('tpsadmin')}}" class="btn btn-primary {{Request::routeIs('tpsadmin')?'active':''}}">TPS</a>
      </div>
    </div>
  </div>
</br>
  <div class="col-sm-6 mb-4">
    <div class="card text-center">
    <img class="card-img-top" src="/image/suratpengajuan.png" width="200" height="200"  alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Pengajuan Pindah</h5>
        <p class="card-text">Untuk melihat, menyetujui/menolak, dan memasukkan data Pengajuan Pindah Masuk atau Keluar Kota Yogykarta.</p>
        <a href="{{route('pilihansm')}}" class="btn btn-primary {{Request::routeIs('pilihansm')?'active':''}}">Pindah Masuk</a>
        <a href="{{route('SuratKeluar')}}" class="btn btn-primary {{Request::routeIs('SuratKeluar')?'active':''}}">Pindah Keluar</a>
      </div>
    </div>
  </div>
</br>

  <div class="col-sm-6">
    <div class="card text-center">
    <img class="card-img-top" src="/image/kirim.png" width="200" height="200"  alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Follow UP</h5>
        <p class="card-text">Untuk mendownload atau mengupload data PDF.</p>
        <a href="{{route('FUMasuk')}}" class="btn btn-primary {{Request::routeIs('FUMasuk')?'active':''}}">Follow Up Masuk</a>
        <a href="{{route('FUKeluar')}}" class="btn btn-primary {{Request::routeIs('FUKeluar')?'active':''}}">Follow Up Keluar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-center"> 
    <img class="card-img-top" src="/image/history.png" width="200" height="200"  alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">History</h5>
        <p class="card-text">Untuk melihat semua data dari Pengajuan Pindah Masuk dan Keluar baik yang diterima atau ditolak.</p>
        <a href="{{route('HisMasuk')}}" class="btn btn-primary {{Request::routeIs('HisMasuk')?'active':''}}">History Masuk</a>
        <a href="{{route('HisKeluar')}}" class="btn btn-primary {{Request::routeIs('HisKeluar')?'active':''}}">History Keluar</a>
      </div>
    </div>
  </div>
</div>
</br>
</div>
</div>
</div>

@endsection     