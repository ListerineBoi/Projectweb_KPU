@extends('layouts.nav')

@section('content') 

<div class="container">
<h3 class="text-bold text-light text-center bg-orange">Halaman Detail Pemilih Pengajuan Masuk</h3>
</br>

<h2 class="text-center"> Detail Informasi Asal Pemilih </h2>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">No KK</th>
			<th class="text-center">Provinsi</th>
			<th class="text-center">Kabupaten</th>
			<th class="text-center">Kecamatan</th>
            <th class="text-center">Kelurahan</th>
            <th class="text-center">Alasan</th>
		</tr>
		<tr>
			<td class="text-center">{{$sm->no_kk}}</td>
			<td class="text-center">{{$det['prov']}}</td>
			<td class="text-center">{{$det['kab']}}</td>
			<td class="text-center">{{$det['kec']}}</td>
            <td class="text-center">{{$det['kel']}}</td>
            <td class="text-center">{{$sm->alasan}}</td>
		</tr>
	</thead>
</table>

</br>

<h2 class="text-center"> Detail Informasi Domisili di Yogyakarta </h2>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">Kabupaten</th>
			<th class="text-center">Kecamatan</th>
			<th class="text-center">Kelurahan</th>
			<th class="text-center">E-Mail</th>
            <th class="text-center">No HP (WA)</th>
            <th class="text-center">Foto KTP</th>
            <th class="text-center">Foto KK</th>
		</tr> 
		<tr>
			<td class="text-center">{{$det['kabj']}}</td>
			<td class="text-center">{{$det['kecj']}}</td>
			<td class="text-center">{{$det['kelj']}}</td>
			<td class="text-center">{{$sm->email}}</td>
            <td class="text-center">{{$sm->No_hp}}</td>
            <td class="text-center"><a href="/storage/c1/{{$sm->img_c1}}">{{$sm->img_c1}}</a></td>
            <td class="text-center"><a href="/storage/ktp/{{$sm->img_ktp}}">{{$sm->img_ktp}}</a></td>
		</tr>
	</thead>
</table>
@if(Auth::user()->role!=2)
<a type="button" href="{{route('editpengajuan', ['id' => $sm->id])}}" class="btn text-center btn-primary">Edit Domisili Jogja</a>
@endif
</br>
</div>
@endsection 