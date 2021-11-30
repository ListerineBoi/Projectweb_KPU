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
    <title>Publik SIDALIH</title>
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-orange">
  <a class="navbar-brand" href="/Publik/Home"><img src="/image/logoKPU.png" width="30" height="30" class="d-inline-block align-top" alt="">Sistem Pindah Pemilih KPU Kota Yogyakarta</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link text-bold {{Request::RouteIs('homePublik')?'active':''}}" href="{{route('homePublik')}}"> <i class="fa fa-home"></i> Home </h4></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{Request::RouteIs('tps')?'active':''}}" href="{{route('tps')}}"> <i class="fa fa-link"></i> TPS</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{Request::RouteIs('SMPublik')?'active':''}} {{Request::RouteIs('SKPublik')?'active':''}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-clipboard"></i> Pengajuan Pindah
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item {{Request::RouteIs('SMPublik')?'active':''}}" href="{{route('SMPublik')}}">Pengajuan Masuk</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item {{Request::RouteIs('SKPublik')?'active':''}}" href="{{route('SKPublik')}}">Pengajuan Keluar</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-orange text-center text-white" style="auto">
  <!-- Grid container -->
  <div class="container p-4">

  <div class="container p-4">
  <h5 class="text-uppercase">Hubungi Kami</h5>
    <!-- Section: Social media -->
    <section class="mb-4">
       <!-- Whatsapp -->
       <a class="btn btn-outline-light btn-floating m-1" href="085156901792" role="button"
        ><i class="fa fa-phone"></i
      ></a>

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
    <!-- Section: Social media -->


    <!-- Section: Text -->
    <section class="mb-4">
      <p>
      </p>
    </section>
    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <a class="navbar-brand" href="/Publik/Home"><img src="/image/logoKPU.png" width="30" height="30" class="d-inline-block align-top" alt="" style=" text-align:justify;width:100%;"></a>
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
        <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase"></h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white"></a>
            </li>
            <li>
              <a href="#!" class="text-white"></a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
          
          <h5 href="#!" class="list-unstyled mb-0"></h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white"></a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Kritik & Saran</h5>
        <div class="mb-5">
        <textarea class="form-control" id="message-text"></textarea>
        </br>
        <button type="submit" class="btn btn-danger">Kirim</button>
        </div>
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
    © 2021 Copyright :
    <a class="text-white" href="https://kota-yogyakarta.kpu.go.id/">KPU Kota Yogyakarta</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</body>
        
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/dropdownfilter.js') }}"></script>
    <script src="{{ asset('js/dis.js') }}"></script>
 
</html>
