@extends('layouts.nav')

@section('content') 

<form method="post" action="{{route('savetps')}}" enctype='multipart/form-data'>
@csrf

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
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
            <a href="/TPS/Admin" type="button" class="btn btn-dark" class="text-right" style="float: right;">Kembali</a>
    </div>
            
    </form>
			
			</div>
			
			</div> 
			
			</div>	
			<!-- ///// tulung dirapike do nuwun -->
			<form method="post" action="{{route('importtps')}}" enctype='multipart/form-data'>
			@csrf
			<div class="form-group row">
                <label class="control-label col-sm-2" for="ftktp">Upload KTP *</label>
                <div class="col-sm-10">
                <input type="file" class="form-control-file" name="excel">
            </br>
            </div>
			<button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Kirim Formulir</button>
			</form>
@endsection  