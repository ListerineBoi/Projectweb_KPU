@extends('layouts.navPub')

@section('content') 
<div class="container">
<div class="col-12 align-items-center">
<h2 class="text-center text-light bg-orange">DATA TPS</h2>
</div>
</br>
<div class="row m-2">
  @foreach($tps as $row)

      <div class="col md-3 mb-2" style="width: 18rem;">
          <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$row->nama}}</h5>
                  <div class="alert alert-danger" role="alert">
                  {{$row->jml_p_tetap+$row->jml_p_pilih}}/{{$row->q_suara}}
                  </div>
                </div>
          </div>
      </div>
  </br>
  @endforeach
</div>
</div>

@endsection