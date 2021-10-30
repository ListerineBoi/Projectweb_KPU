@extends('layouts.nav')

@section('content') 

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
            <td class="text-center">Foto KTP</td>
            <td class="text-center">Foto KK</td>
		</tr>
	</thead>
</table>

</br>
            <button type="button" class="btn btn-danger" class="text-right" style="float: right;">Close</button>
@endsection 