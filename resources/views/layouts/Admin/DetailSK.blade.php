@extends('layouts.nav')

@section('content') 

<div class="container">
<h3 class="text-bold text-light text-center bg-orange">Halaman Detail Pemilih Pengajuan Keluar</h3>
</br>

<div class="card border-dark">
<h2 class="text-center"> Detail Informasi Domisili Yogyakarta </h2>
<table class="table table-bordered table-striped">
	<thead>
		<tr> 
			<th class="text-center">Kabupaten</th>
			<th class="text-center">Kecamatan</th>
			<th class="text-center">Kelurahan</th>
            <th class="text-center">TPS</th>
			<th class="text-center">E-Mail</th>
            <th class="text-center">No HP (WA)</th>
            <th class="text-center">Foto KTP</th>
            <th class="text-center">Foto KK</th>
			@if($sk->surat_acc!=null)
			<th class="text-center">PDF Terima</th>
			@endif
		</tr>
		<tr>
			<th class="text-center">{{$det['kabj']}}</th>
			<th class="text-center">{{$det['kecj']}}</th>
			<th class="text-center">{{$det['kelj']}}</th>
            <th class="text-center">TPS</th>
			<th class="text-center">{{$sk->email}}</th>
            <th class="text-center">{{$sk->No_hp}}</th>
			<td class="text-center"><a type="button" href="/storage/c1/{{$sk->img_c1}}" class="btn text-center btn-success">Lihat</a></td>
            <td class="text-center"><a type="button" href="/storage/ktp/{{$sk->img_ktp}}" class="btn text-center btn-success">Lihat</a></td>
			@if($sk->surat_acc!=null)
			<td class="text-center"><a type="button" href="/storage/suratFu/{{$sk->surat_acc}}" class="btn text-center btn-success">Lihat</a></td>
			@endif
		</tr>
	</thead>
</table>
</div>
</br>

<div class="card border-dark">
<h2 class="text-center"> Detail Informasi Tujuan Pemilih </h2>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">Provinsi</th>
			<th class="text-center">Kabupaten</th>
			<th class="text-center">Kecamatan</th>
			<th class="text-center">Kelurahan</th>
		</tr>
		<tr>
			<th class="text-center">{{$det['prov']}}</th>
			<th class="text-center">{{$det['kab']}}</th>
			<th class="text-center">{{$det['kec']}}</th>
			<th class="text-center">{{$det['kel']}}</th>
		</tr>
	</thead>
</table>
</div>

</br>
</div>
@endsection 
