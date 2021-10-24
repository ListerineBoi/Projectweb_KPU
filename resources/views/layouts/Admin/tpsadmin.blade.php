@extends('layouts.nav')

@section('content') 

<div class="container">
<div class="col-12 align-items-center">
<h2 class="text-center text-light bg-orange">DATA TPS</h2>
</div>
</br>
<div class="card row m-4"> 
  <div class="card-body text-center">
    <h5 class="card-title">Cek Data TPS</h5>
    <div class="form-group row m-2">
				<div class="col md-3 mb-2">
				<select class="form-control text-center city selectFilter" name="kec_jog" id="select1_1" dt="fetchkeldes">
      			  <option selected>Kecamatan</option>
				  </select>
			</div>
</div>
<div class="form-group row m-2">
				<div class="col md-3 mb-2">
				<select class="form-control text-center city selectFilter" name="kec_jog" id="select1_1" dt="fetchkeldes">
      			  <option selected>Kelurahan</option>
				  </select>
			</div>
</div>
    <a href="/DataTPS/Admin" class="btn btn-primary">Cek Data</a>
  </div>
</div>

<div class="card row m-4">
  <div class="card-body text-center">
    <h5 class="card-title">Input Data TPS</h5>
    <p class="card-text">Klik tombol untuk menambahkan data TPS</p>
    <a href="/InputTPS/Admin" class="btn btn-primary">Input</a>
  </div>
</div>
@endsection 