@extends('layouts.navPub')

@section('content') 

<form method="post" action="{{route('simpanK')}}" enctype='multipart/form-data'>
	@csrf

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
        <h3 class="text-bold text-light text-center bg-orange">FORMULIR PENGAJUAN PERMOHONAN PINDAH PEMILIH KELUAR KOTA YOGYAKARTA</h3>
        </br>
        <h4 class="text-bold text-center"> Alamat Yogyakarta </h4>
        </br>
		<div class="form-group row">
				<label class="control-label col-sm-2" for="nokk">No KK * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nokk" placeholder="Masukkan No KK Anda">
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">NIK * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nik" placeholder="Masukkan NIK Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Nama * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda">
				</div>
			</div>		
        
		<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
				<select class="form-control" name="kec_jog">
      			  <option selected>Pilih Kecamatan anda saat ini...</option>
      			  <option value=1>Danurejan</option>
				  <option value=2>Gondokusuman</option>
				  <option value=3>Gondomanan</option>
				  </select>
				</div>
			</div>
			
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">E-Mail * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email" placeholder="Masukkan E-Mail Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">No HP (WA) * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nohp" placeholder="Masukkan No Whatsapp Anda">
				</div>
			</div>
			<div class="form-group row">
                <label class="control-label col-sm-2" for="ftktp">Upload KK *</label>
                <div class="col-sm-10">
                <input type="file" class="form-control-file" name="img_c1">
     
            </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="ftktp">Upload KTP *</label>
                <div class="col-sm-10">
                <input type="file" class="form-control-file" name="img_ktp">
            </br>
            </div>
            <div class= "col-md-6 text-justify">*(Ekstensi JPG/PNG, File Maks 5 MB)</div>
            </div>
			<div class="text-bold text-center">
    		<h4> Tujuan Pindah </h4>
    		</div>	
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Provinsi </label>
				<div class="col-sm-10">
				<select class="form-control" name="provinsi">
      			  <option selected>Pilih Provinsi...</option>
      			  <option>Aceh</option>
				  <option>Sumatera Utara</option>
				  <option>Sumatera Barat</option>
				  <option>Riau</option>
				  <option>Jambi</option>
				  <option>Kepulauan Riau</option>
				  <option>Bangka Belitung</option>
				  <option>Bengkulu</option>
				  <option>Sumatera Selatan</option>
				  <option>Lampung</option>
				  <option>Banten</option>
				  <option>D.K.I Jakarta</option>
				  <option>Jawa Barat</option>
				  <option>Jawa Tengah</option>
				  <option>Jawa Timur</option>
				  <option>D.I Yogyakarta</option>
				  <option>Bali</option>
				  <option>Kalimantan Barat</option>
				  <option>Kalimantan Tengah</option>
				  <option>Kalimantan Selatan</option>
				  <option>Kalimantan Timur</option>
				  <option>Kalimantan Utara</option>
				  <option>Sulawesi Tenggara</option>
				  <option>Sulawesi Utara</option>
				  <option>Sulawesi Selatan</option>
				  <option>Sulawesi Tengah</option>
				  <option>Gorontalo</option>
				  <option>Sulawesi Barat</option>
				  <option>Maluku</option>
				  <option>Maluku Utara</option>
				  <option>Nusa Tenggara Barat</option>
				  <option>Nusa Tenggara Timur</option>
				  <option>Papua Barat</option>
				  <option>Papua</option>
    			</select>
  				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kabupaten/Kota </label>
				<div class="col-sm-10">
				<select class="form-control" name="kabukot">
      			  <option selected>Pilih Kabupaten/Kota...</option>
      			  <option>Lampung Barat</option>
				  <option>Way Kanan</option>
				  <option>Tulang Bawang</option>
				  <option>Pesisir Barat</option>
				  <option>Tanggamus</option>
				  </select>
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
				<select class="form-control" name="kecamatan">
      			  <option selected>Pilih Kecamatan...</option>
      			  <option>Terbanggi Besar</option>
				  <option>Gunung Sugih Besar</option>
				  <option>Menggala</option>
				  </select>
				</div>
			</div>
 
            </br>

            <button type="submit" class="btn btn-danger center-block" class="text-right center-block" style="float: right;">Kirim Formulir</button>
            <a href="/Publik/Home" type="button" class="btn btn-dark center-block" class="text-right center-block" style="float: right;">Kembali</a>
			</div>
			</div>
			</div>
            </form>

@endsection   