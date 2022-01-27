@extends('layouts.nav')

@section('content') 

<div class="container">
<h3 class="text-bold text-light text-center bg-orange">Halaman Detail Pemilih Pengajuan Masuk</h3>
</br>

<div class="card border-dark">
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
</div>

</br>

<div class="card border-dark">
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
			@if($sm->surat_acc!=null)
			<th class="text-center">PDF Terima</th>
			@endif
		</tr> 
		<tr>
			<td class="text-center">{{$det['kabj']}}</td>
			<td class="text-center">{{$det['kecj']}}</td>
			<td class="text-center">{{$det['kelj']}}</td>
			<td class="text-center">{{$sm->email}}</td>
            <td class="text-center">{{$sm->No_hp}}</td>
            <td class="text-center"><a type="button" href="/storage/c1/{{$sm->img_c1}}" class="btn text-center btn-success">Lihat</a></td>
            <td class="text-center"><a type="button" href="/storage/ktp/{{$sm->img_ktp}}" class="btn text-center btn-success">Lihat</a></td>
			@if($sm->surat_acc!=null)
			<td class="text-center"><a type="button" href="/storage/suratFu/{{$sm->surat_acc}}" class="btn text-center btn-success">Lihat</a></td>
			@endif
		</tr>
	</thead>
</table>
</div>
@if(Auth::user()->role!=2)
@if($sm->status != 1)
<a type="button" href="{{route('editpengajuan', ['id' => $sm->id])}}" class="btn text-center btn-primary">Edit Domisili Jogja</a>
@endif
@endif
</br>
</div>
@endsection 