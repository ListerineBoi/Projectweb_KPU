@extends('layouts.nav')

@section('content') 

<div class="container">
<h3 class="text-bold text-light text-center bg-orange">Halaman Surat Masuk</h3>
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
			<td><button type="button" href="/DetailSM/Admin" class="btn text-center btn-primary">Cek Detail</button></td>
			<td>
            
			
			<div class="container">
  			<!-- Button to Open the Modal -->
  			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_terima{{$loop->iteration}}">
    		Setuju
  			</button>
			  <br>
 
  			<div class="modal fade" id="modal_terima{{$loop->iteration}}">
    		<div class="modal-dialog modal-dialog-centered">
      		<div class="modal-content">
      
        	<!-- Ini adalah Bagian Header Modal -->
        	<div class="modal-header">
          	<h4 class="modal-title">TPS Tujuan Masuk Kota Yogyakarta</h4>
          	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	</div>
			
			<form method="post" action="{{route('verif')}}" enctype='multipart/form-data'>
                @csrf
        	<!-- Ini adalah Bagian Body Modal -->
			<input type="hidden" name="id" value="{{$row->id}}">
			<input type="hidden" name="type" value=0>
        	<div class="modal-body">
          	<div class="dropdown">
          	<label class="control-label col-sm-2" for="nik">TPS </label>
				  <div class="col-sm-10">
				  <select class="form-control" name="tps_jog">
      			  <option selected>Pilih TPS...</option>
      			  @foreach($tps as $row1)
					<option value='{{$row->id}}'>{{$row1->nama}}</option>
				 @endforeach
				  </select>
				</div>
        </div>
        
        <!-- Ini adalah Bagian Footer Modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
		</form>			
			</div>
			</div>
		</div>
		</div>
		</div>
			

			<br>
		
			<div class="container">
  			<!-- Button to Open the Modal -->
  			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_tolak{{$loop->iteration}}">
    		Tolak
  			</button>
 
  			<div class="modal fade" id="modal_tolak{{$loop->iteration}}">
    		<div class="modal-dialog modal-dialog-centered">
      		<div class="modal-content">
      
        	<!-- Ini adalah Bagian Header Modal -->
        	<div class="modal-header">
          	<h4 class="modal-title">Alasan Ditolak</h4>
          	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	</div>
			<form method="post" action="{{route('verif')}}" enctype='multipart/form-data'>
                @csrf
				<input type="hidden" name="id" value="{{$row->id}}">
			<input type="hidden" name="type" value=1>
        	<!-- Ini adalah Bagian Body Modal -->
        	<div class="modal-body">
          <div class="mb-3">
		  
            <label for="message-text" class="col-form-label">Alasan:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>

        </div>
        
        <!-- Ini adalah Bagian Footer Modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
		</form>
      </div>
    </div>
  </div>
</div>

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

</div>
    @endsection   