<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/image/logoKPU.png" type="image/x-icon">
    <title>Admin SIDALIH</title>
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
  <a class="navbar-brand" href="/home"><img src="/image/logoKPU.png" width="30" height="30" class="d-inline-block align-top" alt="">Sistem Pindah Pemilih KPU Kota Yogyakarta</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="/TPS/Admin">TPS</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pengajuan Pindah
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('SuratMasuk')}}">Pengajuan Masuk</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('SuratKeluar')}}">Pengajuan Keluar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          History
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Admin/History/Masuk">Pengajuan Masuk</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/Admin/History/Keluar">Pengajuan Keluar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Follow Up
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Admin/FollowUp/Masuk">Pengajuan Masuk</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/Admin/FollowUp/Keluar">Pengajuan Keluar</a>
        </div>
      </li>
    </ul>
  </div>
  <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item active dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>|
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                      <a class="dropdown-item" href="/Profil/Admin">Profil</a>
                                      <a class="dropdown-item" href="/Setting/Admin">Setting</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
</nav>

<main class="py-4">
      @yield('content')
</main>

<!-- Footer -->
<footer class="bg-orange text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">

  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://web.facebook.com/kpukotajogja?_rdc=1&_rdr" role="button"
        ><i class="fa fa-facebook"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/kpukotajogja" role="button"
        ><i class="fa fa-twitter"></i
      ></a>

      <!-- Website -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://kota-yogyakarta.kpu.go.id/" role="button"
        ><i class="fa fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/kpukotajogja/" role="button"
        ><i class="fa fa-instagram"></i
      ></a>

        <!-- Youtube -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.youtube.com/channel/UCVdSz86o9q2cQKvAQ5QhOYg" role="button"
        ><i class="fa fa-youtube"></i
      ></a>
    </section>
</div>

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Komisi Pemilihan Umum Kota Yogyakarta</h5>

          <ul class="list-unstyled mb-0">
            <p>
            Jl. Magelang No.41, Kricak, Kec. Tegalrejo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55242
            </p>
            <p>
            (0274) 556916
            </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-bold">Pengajuan Surat</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="/PengajuanSurat/Masuk" class="text-white">Surat Masuk</a>
            </li>
            <li>
              <a href="/PengajuanSurat/Keluar" class="text-white">Surat Keluar</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">History</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Pengajuan Surat Masuk</a>
            </li>
            <li>
              <a href="#!" class="text-white">Pengajuan Surat Keluar</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Follow Up</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Pengajuan Surat Masuk</a>
            </li>
            <li>
              <a href="#!" class="text-white">Pengajuan Surat Keluar</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-white" href="https://kota-yogyakarta.kpu.go.id/">KPU Kota Yogyakarta</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
        
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/dropdownfilter.js') }}"></script>
    <script src="{{ asset('js/dis.js') }}"></script>
  </body>
</html>
