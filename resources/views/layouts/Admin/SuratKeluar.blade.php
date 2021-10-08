@extends('layouts.nav')

@section('content') 

<div class="container">
<h3 class="text-bold text-light text-center bg-orange">Halaman Surat Keluar</h3>
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
			<td><a type="button" href="/DetailSK/Admin" class="btn text-center btn-primary">Cek Detail</a></td>
			<td>
			<form method="post" action="{{route('verif')}}" enctype='multipart/form-data'>
                @csrf
			<div class="container">
  			<!-- Button to Open the Modal -->
  			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tengah">
    		Setuju
  			</button>
 
  			<div class="modal fade" id="modal_tengah">
    		<div class="modal-dialog modal-dialog-centered">
      		<div class="modal-content">
      
        	<!-- Ini adalah Bagian Header Modal -->
        	<div class="modal-header">
          	<h4 class="modal-title">TPS Tujuan Masuk Kota Yogyakarta</h4>
          	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	</div>
        
        	<!-- Ini adalah Bagian Body Modal -->
        	<div class="modal-body">
          	<div class="dropdown">
          	<label class="control-label col-sm-2" for="nik">TPS </label>
				  <div class="col-sm-10">
				  <select class="form-control" name="kec_jog">
      			  <option selected>Pilih TPS...</option>
      			  <option value=1>TPS 1</option>
				  <option value=2>TPS 2</option>
				  <option value=3>TPS 3</option>
				  </select>
				</div>
        </div>
        
        <!-- Ini adalah Bagian Footer Modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
        
      </div>
    </div>
  </div>
</div>
	</form>	
			<br>
			<form method="post" action="{{route('verif')}}" enctype='multipart/form-data'>
                @csrf
			<div class="container">
  			<!-- Button to Open the Modal -->
  			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_tengah">
    		Tolak
  			</button>
 
  			<div class="modal fade" id="modal_tengah">
    		<div class="modal-dialog modal-dialog-centered">
      		<div class="modal-content">
      
        	<!-- Ini adalah Bagian Header Modal -->
        	<div class="modal-header">
          	<h4 class="modal-title">Alasan Ditolak</h4>
          	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	</div>
        
        	<!-- Ini adalah Bagian Body Modal -->
        	<div class="modal-body">
          <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Alasan:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
        </div>
        
        <!-- Ini adalah Bagian Footer Modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
        
      </div>
    </div>
  </div>
</div>
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
    <p class="card-text">Klik tombol untuk menambahkan data pemilih ke Surat Keluar</p>
    <a href="/Input/SK" class="btn btn-primary">Formulir</a>
  </div>
</div>

</div>

@endsection  