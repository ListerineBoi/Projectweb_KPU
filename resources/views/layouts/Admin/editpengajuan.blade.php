@extends('layouts.nav')

@section('content') 
<div class="container">
<div class="col-12 align-items-center">
<h2 class="text-center text-light bg-orange">Pengajuan Masuk</h2>
</div>
</br>
<div class="card row m-4"> 
  <div class="card-body text-center">
  <form method="post" action="{{route('saveeditpengajuan')}}">
	  @csrf
    <h5 class="card-title">Data Pengajuan Masuk</h5>
	<input type="hidden" class="form-control" name="id" value="{{$id}}">
    <div class="form-group row m-2">
				<div class="col md-3 mb-2">
				<select class="form-control city selectFilter" name="kec_jog" id="select1_1" dt="fetchkeldes">
					@foreach($kec as $row)
      			  <option value="{{$row->id}}">{{$row->nama}}</option>
					@endforeach
				  </select>
			</div>
</div>
<div class="form-group row m-2">
				<div class="col md-3 mb-2">
        <select class="form-control district selectFilter" name="kel_jog" id="select2_2" dt="fetchtps">
					
				  </select>
			</div>
</div>
<button type="submit" class="btn btn-danger">Simpan</button>
      </form>
</div>

</div>


<!-- ////////////////////// -->

</div>
@endsection 