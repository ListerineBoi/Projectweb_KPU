@extends('layouts.nav')

@section('content') 

<form method="post" action="{{route('savetps')}}" enctype='multipart/form-data'>
@csrf

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
	<div class="card border-dark">
      <div class="card-body">
        <h3 class="text-light text-center bg-orange">FORM DATA TPS</h3>
        </br>

        <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Lokasi Kecamatan</label>
				<div class="col-sm-10">
				
				<select class="form-control city selectFilter" name="kec_jog" id="select1_1" dt="fetchkeldes">
      			  <option selected>Pilih Kecamatan</option>
					@foreach($kec as $row)
      			  <option value="{{$row->id}}">{{$row->nama}}</option>
					@endforeach
				  </select>
  				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Lokasi Kelurahan</label>
				<div class="col-sm-10">
				<select class="form-control district selectFilter" name="kel_jog" id="select2_2" dt="fetchtps">
      			  <option selected>Pilih kelurahan</option>
				  </select>
  				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Nama</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Nama TPS">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="alamat" placeholder="Alamat TPS">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Koordinat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="koordinat" placeholder="Koordinat TPS">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Jumlah Pemilih Tetap</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="jml" placeholder="Jumlah Pemilih Tetap di TPS Tersebut">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Presentase Prediksi kuota kosong</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" name="pres" placeholder="10">
				</div>
				<div class="col-sm-2">
					<h4>%</h4>	
				</div>
			</div>		
            
            <div class= "col-md-6 text-justify">* Wajib Diisi</div>
			<br>
            <button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Kirim Formulir</button>
			</form>
    </div>
	</div>
	</div>
	</div>
	</div>
    
</br>

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
<div class="col-md-10">
<div class="card border-dark">
<div class="card-body text-center">
<h3 class="text-light text-center bg-orange">Tata Cara Upload File TPS Excel</h3>	
<h4>1. Kolom tidak menggunakan header</h4>
</br>
<h4>2. Koordinat menggunakan format tanpa huruf dan koordinat x dan y dipisahkan dengan koma</h4>
</br>
<h4>kolom 1= merupakan id kelurahan</br></br>
kolom 2=merupakan no TPS</br></br>
kolom 3=Alamat TPS</br></br>
Kolom 4=jumlah pemilih tetap</br></br>
kolom 5 = presentase perkiraan surat yang tersedia</br></br>
kolom 6 = koordinat</h4></br></br></br>
<h4>Contoh Excel yang Benar : </h4>
<img src="/image/contohbenar.jpeg" class="w-100 h-20" title="">
</div>
</div>
</div>
</div>
</div>
</br>

<form method="post" action="{{route('importtps')}}" enctype='multipart/form-data'>
			@csrf
<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
<div class="col-md-10">
<div class="card border-dark">
      <div class="card-body">
        <h3 class="text-light text-center bg-orange">FORM DATA TPS</h3>	
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Lokasi Kecamatan</label>
				<div class="col-sm-10">
				<select class="form-control city selectFilter" name="kec_jog" id="selecttps1" dt="fetchkeldes">
      			  <option selected>Pilih Kecamatan</option>
					@foreach($kec as $row)
      			  <option value="{{$row->id}}">{{$row->nama}}</option>
					@endforeach
				  </select>
  				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Lokasi Kelurahan</label>
				<div class="col-sm-10">
				<select class="form-control district selectFilter" name="kel_jog" id="selecttps2" dt="fetchidkeldes">
				  </select>
  				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Id Kelurahan</label>
				<div class="col-sm-10">
				<input type="text" class="form-control" name="jml" id="selecttps3" readonly>
  				</div>
			</div>
			<div class="form-group row">
                <label class="control-label col-sm-2" for="ftktp">Upload EXCEL *</label>
                <div class="col-sm-10">
                <input type="file" class="form-control-file" name="excel">
            </br>
            </div>
			</div>
			<button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Kirim Formulir</button>
			</form>
</div>
	</div> 
		</div>
		</div> 
		</div>
@endsection  