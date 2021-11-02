@extends('layouts.nav')

@section('content') 

<div class="container">
<div class="row h-100 justify-content-center align-items-center bg-light">
    <div class="col-md-10">
        <h3 class="text-light text-center bg-orange">PROFIL</h3>
</br>
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">No HP</th>
      <th scope="col">Alamat</th>
      <th scope="col">Wilayah Kecamatan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mark Lee</td>
      <td>markleenct@gmail.com</td>
      <td>leesooman</td>
      <td>097634658922</td>
      <td>Yeongwonhi, Daegu, Gyeong-Do, South Korea</td>
      <td>Daeguwon</td>
    </tr>
  </tbody>
</table>
<input class="btn btn-dark" type="submit" value="Edit Profil">
</div>
</div>
</div>

@endsection 