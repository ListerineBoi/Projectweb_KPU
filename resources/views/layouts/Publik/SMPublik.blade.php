@extends('layouts.navPub')

@section('content') 

<form method="GET" action="/transaksi/view/simpan">
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
					<input type="text" class="form-control" id="nokk" placeholder="Masukkan No KK Anda">
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">NIK * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nik" placeholder="Masukkan NIK Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Nama * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda">
				</div>
			</div>		
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Provinsi </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="provinsi" placeholder="Masukkan Provinsi Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kabupaten/Kota </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kabukot" placeholder="Masukkan Kabupaten/Kota Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kecamatan" placeholder="Masukkan Kecamatan Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kelurahan/Desa </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan Kelurahan/Desa Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">TPS </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="tps" placeholder="Masukkan TPS Asal Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Disabilitas </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="disabil" placeholder="Masukkan Keterangan Disabilitas Anda atau (-) Jika Tidak">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Alasan Pindah </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="alasan" placeholder="Masukkan Alasan Pindah Pemilih ">
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
					<input type="text" class="form-control" id="kabukot" placeholder="Masukkan Kabupaten/Kota Asal Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kecamatan" placeholder="Masukkan Kecamatan Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kelurahan/Desa </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan Kelurahan/Desa Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">RW * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan RW Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">RT * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan RT Anda Tinggal Sekarang">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">E-Mail * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan E-Mail Anda">
				</div>
			</div>
            <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">No HP (WA) * </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keldes" placeholder="Masukkan No Whatsapp Anda">
				</div>
			</div>
            <div class="form-group row">
                <label class="control-label col-sm-2" for="ftktp">Upload Scan KTP</label>
                <div class="col-sm-10">
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </br>
            </div>
            <div class= "col-md-6 text-justify">*(Ekstensi JPG/PNG, File Maks 5 MB)</div>
            </div>
            </div>
            </br>
</div>
            <button type="button" class="btn btn-danger" class="text-right" style="float: right;">Kirim Formulir</button>
            <button type="button" class="btn btn-dark" class="text-right" style="float: right;">Kembali</button>
    </form>

@endsection   