<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sistem Pindah Pemilih KPU Kota Yogyakarta</title>
  </head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-light bg-danger">
  <a class="navbar-brand text-light" href="https://kota-yogyakarta.kpu.go.id/">
    <img src="/image/logoKPU.png" width="30" height="30" class="d-inline-block align-top" alt="">
    KPU Kota Yogyakarta
  </a>
  <a class="navbar-brand text-light ml-auto" href="/Publik/Home">
  Halaman Publik 
  </a>
  
  <a class="navbar-brand text-light"> | </a>

  <div class="items-top justify-center ">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <button type="Submit" href="{{ url('/home') }}" class="btn btn-dark">Home</button>
                    @else
                    <a href="{{ route('login') }}" class="navbar-brand text-light">Log in (Admin)</a>
                    @endauth
                </div>
                @endif
</nav>

<div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    <h1 class="display-4">SELAMAT DATANG DI SISTEM PINDAH PEMILIH KPU KOTA YOGYAKARTA</h1>
    <p class="lead">Website ini berguna untuk melakukan pengajuan permohonan Surat Masuk dan Surat Keluar Pemilih Kota Yogyakarta</p>
  </div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/image/MoU_KPU.jpeg" alt="">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/image/MoU_UKDW_KPU.jpeg" alt="">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/image/Pleno_KPU" alt="">
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
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>