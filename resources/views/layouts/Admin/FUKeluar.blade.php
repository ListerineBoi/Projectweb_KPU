@extends('layouts.nav')

@section('content') 

<div class="container">
<h3 class="text-bold text-light text-center bg-orange">Halaman Follow Up Pengajuan Surat Keluar</h3>
</br>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">NIK</th>
			<th class="text-center">Nama</th>
			<th class="text-center">Detail</th>
            </tr>
	</thead>  
	<tbody>
	@foreach($list as $row)
		<tr>
		
			<td>{{$loop->iteration}}</td>
			<td>{{$row->nik}}</td>
			<td>{{$row->nama}}</td>
            <td><div class="col text-center">
				<a type="button" href="{{route('printpdf', ['id' => $row->id])}}" class="btn text-center btn-primary">Download template surat Terima</a>
				<div class="container text-center">
  			<!-- Button to Open the Modal -->
  			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_upload">
    		Upload Surat Terima
  			</button>
			  <br>
 
  			<div class="modal fade" id="modal_upload">
    		<div class="modal-dialog modal-dialog-centered">
      		<div class="modal-content">
      
        	<!-- Ini adalah Bagian Header Modal -->
        	<div class="modal-header">
          	<h4 class="modal-title">Upload File Surat Terima</h4>
          	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	</div>
			
			<form method="post" action="{{route('verif')}}" enctype='multipart/form-data'>
                @csrf
        	<!-- Ini adalah Bagian Body Modal -->
			<div class="modal-body">
          	<div class="mb-3">
            <div class="form-group row">
                <div class="col-sm-12">
                <input type="file" class="form-control-file" name="img_ktp">
            </br>
            </div>
            <div class= "col-sm-12 text-justify">*(Ekstensi PDF, File Maks 5 MB)</div>
          	</div>
        	</div>
        
        <!-- Ini adalah Bagian Footer Modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
		</form>			
			</div>
			</div>
		</div>
		</div>
		</div>
            </div></td>
			</tr>
			@endforeach
        </div></table>
@endsection   