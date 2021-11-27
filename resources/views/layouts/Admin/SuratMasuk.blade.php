@extends('layouts.nav')

@section('content') 

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
<div class="col-md-10">
<h3 class="text-bold text-light text-center bg-orange">Halaman Pengajuan Masuk</h3>
<div class="card border-dark">
<div class="card-body">
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
			<td><div class="col text-center">
                <a type="button" href="{{route('DetailSM', ['id' => $row->id])}}" class="btn text-center btn-primary">Cek Detail</a>
            </div></td>
			<td>
            
			
			<div class="container text-center">
  			<!-- Button to Open the Modal -->
			  @if(Auth::user()->role!=2)
  			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_terima{{$loop->iteration}}">
    		Setuju
  			</button>
			  @endif
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
				

			<div class="form-group row">
			
				<div class="col-sm-10">
				<select class="form-control district selectFilter" name="tps_jog" id="select2_2">
      			  <option selected>Pilih TPS...</option>
					@if(Auth::user()->role !=2)
					@foreach($tps as $tp)
					<option selected value="{{$tp->id}}">{{$tp->nama}} {{$tp->alamat}}</option>
					@endforeach
					@endif
				  </select>
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
		
			<div class="container text-center">
  			<!-- Button to Open the Modal -->
			  @if(Auth::user()->role!=2)
  			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_tolak{{$loop->iteration}}">
    		Tolak
  			</button>
			  @endif
 
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
{{$list->links()}}
</div>
</div>

</br>
@if(Auth::user()->role!=2)
<div class="card">
  <div class="card-body text-center">
    <h5 class="card-title">Formulir Input Data Pemilih</h5>
    <p class="card-text">Klik tombol untuk menambahkan data pemilih ke Pengajuan Masuk</p>
    <a href="/Input/SM" class="btn btn-primary">Formulir</a>
  </div>
</div>
@endif
</div>
</div>
</div>
    @endsection   