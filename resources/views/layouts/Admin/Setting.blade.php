@extends('layouts.nav')

@section('content') 

<form method="post" action="{{route('saveAdmin')}}" enctype='multipart/form-data'>
@csrf

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
        <h3 class="text-light text-center bg-orange">FORM DATA SUB-ADMIN</h3>
        </br>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Nama Sub-Admin</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Sub-Admin">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email" placeholder="Masukkan Email Sub-Admin">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="pass" placeholder="Masukkan Password Sub-Admin">
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Jenis Admin </label>
				<div class="col-sm-10">
				<select class="form-control" id="dis2" name="role">
				<option  value="0">Mengelola</option>
				<option  value="2" selected>Melihat</option>
				</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik" data-target="district">Kecamatan </label>
				<div class="col-sm-10">
				<select class="form-control city selectFilter" name="kec_jog" id="select1_1" dt="fetchkeldes">
      			  <option selected>Pilih Kecamatan anda saat ini...</option>
					@foreach($kec as $row)
      			  <option value="{{$row->id}}">{{$row->nama}}</option>
					@endforeach
				  </select>
				</div>
			</div>

			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">kelurahan </label>
				<div class="col-sm-10">
				<select class="form-control district selectFilter" name="kel_jog" id="select2_2" dt="fetchtps" >
      			  <option selected>Pilih kelurahan anda saat ini...</option>
					{{ csrf_field() }}
				  </select>
				</div>
			</div>
            </br>
            <div class= "col-md-6 text-justify">* Wajib Diisi</div>
			<button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Save</button>
    </div>
            </br>
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
            <th class="text-center">Wilayah Kecamatan</th>
			<th class="text-center">Role</th>
			<th class="text-center">Action</th>
		</tr>
		@foreach($user as $row)
		<tr>
			<td class="text-center">{{$row->name}}</td>
			<td class="text-center">{{$row->email}}</td>
            <td class="text-center">{{$row->lokasi}}</td>
			<td class="text-center">@if($row->role==1)Admin Utama @elseif($row->role==0)Admin Kelurahan @else Admin Kecamatan @endif</td>
			<td class="text-center"><a type="button" class="btn btn-danger" href="{{route('deladmin', ['id' => $row->id])}}">Delete</a></td>
		</tr>
		@endforeach
</thead>
<tbody>


</tbody>
</table>

</div>
</div>
</div>

@endsection 