@extends('layouts.nav')

@section('content') 

<div class="jumbotron jumbotron-fluid text-center">
  <div class="container">
    <h1 class="display-4">Halo! Kamu di Halaman Pengajuan Surat Masuk.</h1>
    <p class="lead">Di halaman ini, kamu bisa Memverifikasi Surat Masuk yang diajukan oleh Pemilih atau memasukkan data Pemilih ke Surat Masuk</p>
  </div>
</div>
</br>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">NIK</th>
			<th class="text-center">Nama</th>
			<th class="text-center">Detail</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($list as $row)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$row->nik}}</td>
			<td>{{$row->nama}}</td>
			<td><button type="button" class="btn text-center btn-primary">Cek Detail</button></td>
			<td>
			<form method="post" action="{{route('verif')}}" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" class="form-control" name="id" value="{{$row->id}}">
				<input type="hidden" class="form-control" name="type" value="0">    
                <button type="submit" class="btn btn-primary">Setuju</button>
            </form>	
			<br>
			<form method="post" action="{{route('verif')}}" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" class="form-control" name="id" value="{{$row->id}}">   
				<input type="hidden" class="form-control" name="type" value="1">    
                <button type="submit" class="btn btn-warning">Tolak</button>
            </form>	
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

</br>

<div class="card">
  <div class="card-body text-center">
    <h5 class="card-title">Formulir Input Data Pemilih</h5>
    <p class="card-text">Klik tombol untuk menambahkan data pemilih ke Surat Masuk</p>
    <a href="/Input/SM" class="btn btn-primary">Formulir</a>
  </div>
</div>
    @endsection   