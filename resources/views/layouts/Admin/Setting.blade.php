@extends('layouts.nav')

@section('content') 

<form method="post" action="{{route('simpanM')}}" enctype='multipart/form-data'>
@csrf

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
        <h3 class="text-light text-center bg-orange">FORM DATA SUB-ADMIN</h3>
        </br>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Nama Sub-Admin</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nik" placeholder="Masukkan Nama Sub-Admin">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Masukkan Email Sub-Admin">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Password</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="disabil" placeholder="Masukkan Password Sub-Admin">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">No HP</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Masukkan No HP Sub-Admin">
				</div>
			</div>	
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Masukkan Alamat Sub-Admin">
				</div>
			</div>	
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Wilayah Kecamatan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Masukkan Wilayah Kecamatan Sub-Admin">
				</div>
            </br>
            <div class= "col-md-6 text-justify">* Wajib Diisi</div>
    </div>
            </br>
            <button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Save</button>
            </div>	
			</div>
			</div> 
			
		</form>
</br>

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
        <h3 class="text-light text-center bg-orange">DATA SUB-ADMIN</h3>
</br>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">Nama</th>
			<th class="text-center">Email</th>
			<th class="text-center">Password</th>
			<th class="text-center">No HP</th>
			<th class="text-center">Alamat</th>
            <th class="text-center">Wilayah Kecamatan</th>
		</tr>
</thead>
<tbody>


</tbody>
</table>
<button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Edit Data</button>
</div>
</div>
</div>

@endsection 