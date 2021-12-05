@extends('layouts.nav')

@section('content') 


<form method="post" action="{{route('saveIsk')}}" enctype='multipart/form-data'>
	@csrf

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
	<div class="card border-dark">
      <div class="card-body">
        <h3 class="text-light text-center bg-orange">FORMULIR PENGAJUAN PERMOHONAN PINDAH PEMILIH KELUAR KOTA YOGYAKARTA</h3>
        </br>
		@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            </ul>
                            </div>
                    @endif

                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{\Session::get('success')}}</p>
                        </div>
                    @endif

                    @if(\Session::has('Forbidden'))
                        <div class="alert alert-danger">
                            <p>{{\Session::get('Forbidden')}}</p>
                        </div>
                    @endif
        <h4 class="text-bold text-center"> ------- Alamat Yogyakarta ------- </h4>
        </br> 
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nokk">No KK * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nokk" placeholder="Masukkan No KK Anda">
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">NIK * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nik" placeholder="Masukkan NIK Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Nama * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda">
				</div>
			</div>	
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Jenis Kelamin</label>
				<div class="col-sm-10">
				<select class="form-control" name="jk">
				<option selected>Pilih Jenis Kelamin...</option>
				<option value='0' selected>Pria</option>
				<option value='1'>Wanita</option>
				</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Alamat di Yogyakarta</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="alamatjog" placeholder="Masukkan Alamat Anda di Yogyakarta ">
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

			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Tps </label>
				<div class="col-sm-10">
				<select class="form-control district selectFilter" name="tps_jog" id="select3_3">
      			  <option selected>Pilih TPS...</option>
					{{ csrf_field() }}
				  </select>
				</div>
			</div>
          
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">E-Mail * </label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email" placeholder="Masukkan E-Mail Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">No HP (WA) * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nohp" placeholder="Masukkan No Whatsapp Anda">
				</div>
			</div>

			<div class="form-group row">
                <label class="control-label col-sm-2" for="ftktp">Upload KK *</label>
                <div class="col-sm-10">
                <input type="file" class="form-control-file" name="img_c1">
     
            </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-sm-2" for="ftktp">Upload KTP *</label>
                <div class="col-sm-10">
                <input type="file" class="form-control-file" name="img_ktp">
            </br>
            </div>
            <div class= "col-md-6 text-justify">*(Ekstensi JPG/PNG, File Maks 5 MB)</div>
            </div>
</br>
			<div class="text-bold text-center">
    		<h4> ------- Tujuan Pindah ------- </h4>
    		</div>	
</br>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Provinsi </label>
				<div class="col-sm-10">
				<select class="form-control" name="provinsi" id="select1" dt="fetchkabkot">
				<option selected>Pilih Provinsi...</option>
				@foreach($prov as $row1)
      			  <option value="{{$row1->id}}">{{$row1->nama}}</option>
					@endforeach
    			</select>
  				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kabupaten/Kota </label>
				<div class="col-sm-10">
				<select class="form-control" name="kabukot" id="select2" dt="fetchkec" >
      			  <option selected>Pilih Kabupaten/Kota...</option>
      			  {{ csrf_field() }}
				  </select>
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
				<select class="form-control" name="kecamatan" id="select3" dt="fetchkeldes">
      			  <option selected>Pilih Kecamatan...</option>
      			  {{ csrf_field() }}
				  </select>
				</div>
			</div>

			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">kelurahan </label>
				<div class="col-sm-10">
				<select class="form-control district selectFilter" name="kel" id="select4" >
      			  <option selected>Pilih kelurahan anda saat ini...</option>
					{{ csrf_field() }}
				  </select>
				</div>
			</div>
            </br>

            <button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Kirim Formulir</button>
			
			</div>
			</div> 
		</div>
			</div> 
</div>    
		</form>


@endsection  