@extends('layouts.nav')

@section('content') 

<div class="container">
<h3 class="text-bold text-light text-center bg-orange">Halaman History Surat Keluar</h3>
</br>

<div class="card border-dark">
<div class="card-body">
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">NIK</th>
			<th class="text-center">Nama</th>
			<th class="text-center">Detail</th>
            </tr>
	</thead>
	<tbody>
	@foreach($list as $row)
		<tr>
		<td>{{$loop->iteration}}</td>
			<td>{{$row->nik}}</td>
			<td>{{$row->nama}}</td>
			<td>@if($row->status==1)
				diterima
				@elseif($row->status==2)
    			ditolak
				@else
				Menunggu Surat Bukti Pindah
				@endif
			</td>
            <td><div class="col text-center">
                <a type="button" href="{{route('DetailSK', ['id' => $row->id])}}" class="btn text-center btn-primary">Cek Detail</a>
            </div></td>
		</tr>
			@endforeach
</table> 
</div>
</div>

<div class="card row m-4">
  <div class="card-body text-center">
    <h5 class="card-title">Download File Excel</h5>
    <p class="card-text">Klik tombol untuk mendownload file Excel</p>
    <a href="{{route('exportP_keluar')}}" class="btn btn-primary">Download</a>
  </div>
</div>
</div>
{{$list->links()}}
@endsection   