@extends('layouts.nav')

@section('content') 

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
		</tr>
	</thead>
</table>

</br>

<h2 class="text-center"> Detail Informasi Tujuan Pemilih </h2>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">Provinsi</th>
			<th class="text-center">Kabupaten</th>
			<th class="text-center">Kecamatan</th>
			<th class="text-center">Kelurahan</th>
            <th class="text-center">Alasan</th>
		</tr>
	</thead>
</table>

</br>
            <button type="button" class="btn btn-danger" class="text-right" style="float: right;">Close</button>
@endsection 
