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
      <img class=" w-100 h-50" src="http://127.0.0.1:8000/image/Pleno_KPU.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block  bg-orange">
      <h1 style = "font-family:perpetua text-black; ">SELAMAT DATANG DI SIDALIH KPU KOTA YOGYAKARTA</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img class=" w-100 h-50" src="http://127.0.0.1:8000/image/Pleno_KPU.jpeg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block  bg-orange">
      <h1 style = "font-family:perpetua text-black; ">SELAMAT DATANG DI SIDALIH KPU KOTA YOGYAKARTA</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img class=" w-100 h-50" src="http://127.0.0.1:8000/image/Pleno_KPU.jpeg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block bg-orange">
      <h1 style = "font-family:perpetua text-black; ">SELAMAT DATANG DI SIDALIH KPU KOTA YOGYAKARTA</h1>
      </div>
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
        <p class="card-text">Diisi Tata Cara dan Informasi.</p>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card border-dark">
      <div class="card-body">
        <h5 class="card-title text-bold text-center">Tata Cara Pengajuan Pindah Keluar</h5>
        <p class="card-text">Diisi Tata Cara dan Informasi.</p>
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
@endsection   