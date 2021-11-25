@extends('layouts.nav')

@section('content') 

<form method="post" action="{{route('savetpsEdit')}}" enctype='multipart/form-data'>
@csrf

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
        <h3 class="text-light text-center bg-orange">FORM DATA TPS</h3>
        </br>
		<input type="hidden" class="form-control" name="id" value="{{$tps->id}}">
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Nama</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" value="{{$tps->nama}}">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Alamat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="alamat" value="{{$tps->alamat}}">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Koordinat</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="koordinat" value="{{$tps->koordinat}}">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Jumlah Pemilih Tetap</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="jml" value="{{$tps->jml_p_tetap}}">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Presentase Prediksi kuota kosong</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" name="pres" value="{{$tps->presentase}}">
				</div>
				<div class="col-sm-2">
					<h4>%</h4>	
				</div>
			</div>		
            
            <div class= "col-md-6 text-justify">* Wajib Diisi</div>
			<br>
            <button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Kirim Formulir</button>
            
    </div>
            
    
			</div>
			</div> 
			</div>	
		</form>

@endsection  