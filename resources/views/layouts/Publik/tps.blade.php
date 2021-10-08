@extends('layouts.navPub')

@section('content') 

<div class="container">
<div class="col-12 align-items-center">
<h2 class="text-center text-light bg-orange">DATA TPS</h2>
</div>
</br>
<div class="row m-2">
<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 1</h5>
    <div class="alert alert-danger" role="alert">
  250/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 2</h5>
    <div class="alert alert-danger" role="alert">
  223/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 3</h5>
    <div class="alert alert-danger" role="alert">
  198/250
</div>
  </div>
</div>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 4</h5>
    <div class="alert alert-danger" role="alert">
  223/250
</div>
  </div>
</div>

<div class="row m-2">
<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 1</h5>
    <div class="alert alert-danger" role="alert">
  250/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 2</h5>
    <div class="alert alert-danger" role="alert">
  223/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 3</h5>
    <div class="alert alert-danger" role="alert">
  198/250
</div>
  </div>
</div>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 4</h5>
    <div class="alert alert-danger" role="alert">
  223/250
</div>
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

<div id="googleMap" style="width:100%;height:380px;"></div>

</div>
</div>

@endsection