@extends('layouts.navPub')

@section('content') 
<div class="container">
<div class="col-12 align-items-center">
<h2 class="text-center text-light bg-orange">DATA TPS</h2>
</div>
<div class="card row m-4"> 
  <div class="card-body text-center">
    <h5 class="card-title">Cek Data TPS</h5>
    <div class="form-group row m-2">
				<div class="col md-3 mb-2">
				<select class="form-control text-center city selectFilter" name="kec_jog" id="select1_1" dt="fetchkeldes">
      			  <option selected>Kecamatan</option>
				  </select>
			</div>
</div>
<div class="form-group row m-2">
				<div class="col md-3 mb-2">
				<select class="form-control text-center city selectFilter" name="kec_jog" id="select1_1" dt="fetchkeldes">
      			  <option selected>Kelurahan</option>
				  </select>
			</div>
</div>
    <a href="/DataTPS/Admin" class="btn btn-primary">Cek Data</a>
  </div>
</div>
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

<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
        // fungsi initialize untuk mempersiapkan peta
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-7.785986, 110.383942),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        }

        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<div class="col md-3 mb-2" id="googleMap" style="width:100%;height:380px;"></div>

</div>
</div> 

@endsection