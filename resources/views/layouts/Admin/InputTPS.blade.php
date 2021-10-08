@extends('layouts.nav')

@section('content') 

<form method="post" action="{{route('simpanM')}}" enctype='multipart/form-data'>
@csrf

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
        <h3 class="text-light text-center bg-orange">FORM DATA TPS</h3>
        </br>

        <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Lokasi Kecamatan</label>
				<div class="col-sm-10">
				<select class="form-control" name="provinsi">
      			  <option selected>Pilih Kecamatan...</option>
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
				<label class="control-label col-sm-2" for="nik">Nama</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nik" placeholder="Nama TPS">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Alamat TPS">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Koordinat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="disabil" placeholder="Koordinat TPS">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Jumlah Pemilih Tetap</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Jumlah Pemilih Tetap di TPS Tersebut">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kuota Surat Suara</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Kuota Surat Suara yang Tersedia">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Jumlah Pemilih Pindah</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="alasan" placeholder="Jumlah Pemilih Pindahan">
				</div>
            </br>
            <div class= "col-md-6 text-justify">* Wajib Diisi</div>
    </div>
            </br>
            <button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Kirim Formulir</button>
            <a href="/TPS/Admin" type="button" class="btn btn-dark" class="text-right" style="float: right;">Kembali</a>
    
			</div>
			</div> 
			</div>	
		</form>

@endsection  