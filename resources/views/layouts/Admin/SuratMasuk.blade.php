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
			<th class="text-center">Nama</th>
			<th class="text-center">Detail</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Jhony Ahmad</td>
			<td><button type="button" class="btn text-center btn-primary">Cek Detail</button></td>
			<td><a type="button" class="btn text-center btn-success">Setuju</a>	|
			<a type="button" class="btn text-center btn-danger">Tolak</a></td>
		</tr>
		<tr>
			<td>2</td>
			<td>Rafrafil Jumadil</td>
			<td><button type="button" class="btn text-center btn-primary">Cek Detail</button></td>
			<td><a type="button" class="btn text-center btn-success">Setuju</a>	|
			<a type="button" class="btn text-center btn-danger">Tolak</a></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Diki Alfarabi Hadi</td>
			<td><button type="button" class="btn text-center btn-primary">Cek Detail</button></td>
			<td><a type="button" class="btn text-center btn-success">Setuju</a>	|
			<a type="button" class="btn text-center btn-danger">Tolak</a></td>
		</tr>
		<tr>
			<td>4</td>
			<td>Ma'un Syah</td>
			<td><button type="button" class="btn text-center btn-primary">Cek Detail</button></td>
			<td><a type="button" class="btn text-center btn-success">Setuju</a>	|
			<a type="button" class="btn text-center btn-danger">Tolak</a></td>
		</tr>
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