<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Publik</title>
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="#"><img src="/image/logoKPU.png" width="30" height="30" class="d-inline-block align-top" alt="">KPU Kota Yogyakarta (Surat Masuk)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">TPS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Jumlah Pemilih</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Tata Cara Pindah Pemilih</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pengajuan Surat
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/pindah_memilih/Surat/Masuk">Surat Masuk</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/pindah_memilih/Surat/Keluar">Surat Keluar</a>
        </div>
      </li>
    </ul>
  </div>
  <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>|
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
</nav>

<div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    <h1 class="display-4">Halo! User!</h1>
    <p class="lead">Kamu Di Halaman Pengajuan Surat Masuk</p>
  </div>
</div>

</br>
<form method="GET" action="/transaksi/view/simpan">
<div class="row h-100 justify-content-center align-items-center bg-info">
    <div class="col-md-10">
        <div class="text-bold text-center bg">
        <h3>FORMULIR PENGAJUAN PERMOHONAN PINDAH PEMILIH MASUK KOTA YOGYAKARTA</h3>
        </br>
        <h4> Asal TPS Pemilih</h4>
        </div>
        </br>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nokk">No KK * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nokk" placeholder="Masukkan No KK Anda">
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">NIK * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nik" placeholder="Masukkan NIK Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Nama * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Provinsi </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="provinsi" placeholder="Masukkan Provinsi Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kabupaten/Kota </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kabukot" placeholder="Masukkan Kabupaten/Kota Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kecamatan" placeholder="Masukkan Kecamatan Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kelurahan/Desa </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan Kelurahan/Desa Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">TPS </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="tps" placeholder="Masukkan TPS Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Disabilitas </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="disabil" placeholder="Masukkan Keterangan Disabilitas Anda atau (-) Jika Tidak">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Alasan Pindah </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alasan" placeholder="Masukkan Alasan Pindah Pemilih ">
				</div>
            </br>
            <div class= "col-md-6 text-justify">* Wajib Diisi</div>
    </div>
            </br>
    <div class="text-bold text-center">
    <h4> Domisili Pemilih di Yogyakarta </h4>
    </div>
    </br>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kabupaten/Kota </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kabukot" placeholder="Masukkan Kabupaten/Kota Asal Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kecamatan" placeholder="Masukkan Kecamatan Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kelurahan/Desa </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan Kelurahan/Desa Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">RW * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan RW Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">RT * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan RT Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">E-Mail * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan E-Mail Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">No HP (WA) * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan No Whatsapp Anda">
				</div>
			</div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="ftktp">Upload Scan KTP</label>
                <div class="col-sm-10">
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </br>
            </div>
            <div class= "col-md-6 text-justify">*(Ekstensi JPG/PNG, File Maks 5 MB)</div>
            </div>
            </div>
            </br>
</div>
            <button type="button" class="btn btn-danger" class="text-right" style="float: right;">Kirim Formulir</button>
            <button type="button" class="btn btn-dark" class="text-right" style="float: right;">Kembali</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>