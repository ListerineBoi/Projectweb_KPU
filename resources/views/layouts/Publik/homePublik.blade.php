@extends('layouts.navPub')

@section('content') 
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class=" w-100 h-50" src="http://127.0.0.1:8000/image/kpu.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class=" w-100 h-50" src="http://127.0.0.1:8000/image/kpu.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class=" w-100 h-50" src="http://127.0.0.1:8000/image/kpu.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</br>

<div class="container">
<h2 class="text-center text-light bg-orange">Home</h2>
</br>
<div class="row">
  <div class="col-sm-6">
    <div class="card border-dark">
      <div class="card-body">
        <h5 class="card-title text-bold text-center">Tata Cara Pengajuan Pindah Masuk</h5>
        <img src="/storage/tatacara/{{DB::table("tatacara")->value('img1')}}" class="w-100 h-500" title="">
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card border-dark">
      <div class="card-body">
        <h5 class="card-title text-bold text-center">Tata Cara Pengajuan Pindah Keluar</h5>
        <img src="/storage/tatacara/{{DB::table("tatacara")->value('img2')}}" class="w-100 h-500" title="">
      </div>
    </div>
  </div>
</div>

</br>

  <div class="container"> 
  <div class="card border-dark text-center">
      <div class="card-body">
    <p class="lead">Cek Anda sudah terdaftar sebagai pemilih atau belum</p>
    <a href="https://lindungihakpilihmu.kpu.go.id/" class="btn btn-primary">Cek disini</a>
  </div>
</div>
</div>
</div>
</br>

<div class="container">
<div class="col-12 align-items-center">
<div class="row m-2">
  <div class="col-sm-6 mb-4">
    <div class="card text-center">
    <img class="card-img-top" src="/image/rumahtps.jpg" width="200" height="200"  alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">TPS</h5>
        <p class="card-text">Digunakan untuk melihat, menambah dan mengubah data TPS di tiap Kelurahan di Kota Yogyakarta.</p>
        <a href="{{route('tps')}}" class="btn btn-primary {{Request::routeIs('tpsadmin')?'active':''}}">TPS</a>
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
</div>
</div>
</div>
@endsection   