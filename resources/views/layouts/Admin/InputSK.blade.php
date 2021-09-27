@extends('layouts.nav')

@section('content') 


<form method="GET" action="#">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
        <div class="text-bold text-center bg">
        <h3>FORMULIR PENGAJUAN PERMOHONAN PINDAH PEMILIH KELUAR KOTA YOGYAKARTA</h3>
        </br>
        <h4> Alamat Yogyakarta </h4>
        </div>
        </br>
        <div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kabupaten/Kota </label>
				<div class="col-sm-10">
				<select class="form-control" id="exampleFormControlSelect1">
      			  <option selected>Pilih Kabupaten/Kota anda saat ini...</option>
      			  <option>Sleman</option>
				  <option>Kota Yogyakarta</option>
				  <option>Gunung Kidul</option>
				  <option>Bantul</option>
				  <option>Kulonprogo</option>
				  </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kecamatan </label>
				<div class="col-sm-10">
				<select class="form-control" id="exampleFormControlSelect1">
      			  <option selected>Pilih Kecamatan anda saat ini...</option>
      			  <option>Ngaglik</option>
				  <option>Ngemplak</option>
				  <option>Depok</option>
				  </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">Kelurahan </label>
				<div class="col-sm-10">
				<select class="form-control" id="exampleFormControlSelect1">
      			  <option selected>Pilih Kelurahan anda saat ini...</option>
      			  <option>Maguwoharjo</option>
				  <option>Wedomartani</option>
				  <option>Purwomartani</option>
				  </select>
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
                <label class="control-label col-sm-2" for="ftktp">Upload KTP *</label>
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
            <a href="/Surat/Masuk" type="button" class="btn btn-dark" class="text-right" style="float: right;">Kembali</a>
            </form>


@endsection  