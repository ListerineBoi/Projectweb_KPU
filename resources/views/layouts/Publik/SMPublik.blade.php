@extends('layouts.navPub')

@section('content') 

<form method="post" action="{{route('simpanM')}}" enctype='multipart/form-data'>
	@csrf
<div class="row h-100 justify-content-center align-items-center bg-info">
    <div class="col-md-10">
        <div class="text-bold text-center bg">
        <h3>FORMULIR PENGAJUAN PERMOHONAN PINDAH PEMILIH MASUK KOTA YOGYAKARTA</h3>
        </br>
        <h4> Asal TPS Pemilih</h4>
        </div>
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
				<label class="control-label col-sm-2" for="nik">Provinsi </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="provinsi" placeholder="Masukkan Provinsi Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kabupaten/Kota </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="kabukot" placeholder="Masukkan Kabupaten/Kota Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="kecamatan" placeholder="Masukkan Kecamatan Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kelurahan/Desa </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="keldes" placeholder="Masukkan Kelurahan/Desa Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">TPS </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tps" placeholder="Masukkan TPS Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Disabilitas </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="disabil" placeholder="Masukkan Keterangan Disabilitas Anda atau (-) Jika Tnameak">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Alasan Pindah </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="alasan" placeholder="Masukkan Alasan Pindah Pemilih ">
				</div>
            </br>
            <div class= "col-md-6 text-justify">* Wajib Diisi</div>
    </div>
            </br>
    <div class="text-bold text-center">
    <h4> Domisili Pemilih di Yogyakarta </h4>
    </div>
    </br>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kabupaten/Kota </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="kabukot_jog" placeholder="Masukkan Kabupaten/Kota Asal Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="kecamatan_jog" placeholder="Masukkan Kecamatan Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kelurahan/Desa </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="keldes_jog" placeholder="Masukkan Kelurahan/Desa Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">RW * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="rw" placeholder="Masukkan RW Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">RT * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="rt" placeholder="Masukkan RT Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">E-Mail * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email" placeholder="Masukkan E-Mail Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">No HP (WA) * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nohp" placeholder="Masukkan No Whatsapp Anda">
				</div>
			</div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="ftktp">Upload Scan KTP</label>
                <div class="col-sm-10">
                <input type="file" id="file" class="form-control-file" name="img">
            </br>
            </div>
            <div class= "col-md-6 text-justify">*(Ekstensi JPG/PNG, File Maks 5 MB)</div>
            </div>
            </div>
            </br>
</div>
            <button type="submit" class="btn btn-danger" class="text-right" style="float: right;">Kirim Formulir</button>
            <button type="button" class="btn btn-dark" class="text-right" style="float: right;">Kembali</button>
    </form>

@endsection   