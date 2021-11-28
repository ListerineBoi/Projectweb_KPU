@extends('layouts.nav')

@section('content') 

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
        <h3 class="text-light text-center bg-orange">PROFIL</h3>
</br>
<div class="card border-dark">
      <div class="card-body">
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Wilayah Kecamatan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$id->name}}</td>
      <td>{{$id->email}}</td>
      <td>@if($id->role==1)Admin @elseif($id->role==2) subadmin1 @else subadmin2 @endif</td>
      <td>{{$lk}}</td>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

@endsection 