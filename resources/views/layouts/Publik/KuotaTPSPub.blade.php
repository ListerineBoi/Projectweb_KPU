@extends('layouts.navPub')

@section('content') 

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.5.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.5.1/mapbox-gl.css' rel='stylesheet' />

<div class="container">
<div class="col-12 align-items-center">
<h2 class="text-center text-light bg-orange">Kuota TPS</h2>
</div>
<div class="card row m-4">
  <div class="card-body text-center">
    <h5 class="card-title">Kecamatan {{$det['kec']}}</h5>
    <h5 class="card-title">Kelurahan {{$det['kel']}}</h5>
  </div>
</div>
<div class="row m-2">


@foreach($tps as $row)

<div class="col-6" style="width: 18rem;">
    <div class="card text-center" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">{{$row->nama}}</h5>
            <div class="alert alert-danger" role="alert">
            {{round($row->jml_p_tetap*$row->presentase/100-($row->jml_masuk-$row->jml_keluar))}}
            </div>
            <a href="https://www.google.com/maps/place/{{$row->koordinat}}" type="button" class="btn btn-success" >Google Maps</a>
          </div>
    </div>
</div>
@endforeach
</div>
{{$tps->appends(request()->input())->links()}}
</div>
</div>

</br>

<figure class="highcharts-figure">
     <div id="bar"></div> <!-- chart -->
    <p class="highcharts-description text-center">
        Grafik pergerakan Surat Masuk dan Surat Keluar pada TPS yang ada di Kota Yogyakarta
    </p>
</figure>

</br>

<figure class="highcharts-figure">
    <div id="pie"></div>
    <p class="highcharts-description text-center">
    Grafik total Surat Masuk dan Surat Keluar pada TPS yang ada di Kota Yogyakarta
    </p>
</figure>
<div id='map' style='width: 400px; height: 300px;'></div>

<!-- bar chart -->
<script>
  Highcharts.chart('bar', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Surat Masuk dan Surat Keluar Kelurahan {{$det['kel']}}'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            <?php
                foreach($tps as $row1){
                    echo "'".$row1['nama']."'".",";
                }
                ?>

        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Orang'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Orang</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Surat Masuk',
        data: [
            <?php
                foreach($tps as $row2){
                    echo $row2['jml_masuk'].",";
                }
                ?>
    
        ]

    }, {
        name: 'Surat Keluar',
        data: [
            <?php
                foreach($tps as $row3){
                    echo $row3['jml_keluar'].",";
                }
                ?>
        ]

    }]
});
</script>

</br>

<!-- pie chart -->
<script>
  Highcharts.chart('pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Total Surat Masuk dan Surat Keluar Kelurahan {{$det['kel']}}'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [{
            name: 'Surat Masuk',
            y: {{$sumM}},
            
        }, {
            name: 'Surat Keluar',
            y: {{$sumK}}
        }] 
    }]
}); 
</script>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibGlzdGVyaW5lYm9pIiwiYSI6ImNrdmRzenZzMTllbDQyd29mOTN2Nnk4cDAifQ.ILAoM1z0NOugYT9C5yCZpA';
const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [110.361939,-7.808649], // starting position [lng, lat]
    zoom: 9 // starting zoom
});
// Create a new marker.
const places = {
'type': 'FeatureCollection',
'features': [<?php
                $koor="";
                foreach($tps as $row0){
                $koor=explode(", ",$row0['koordinat']);
                echo "{
                'type': 'Feature',
                'properties': {
                'description':"."'".$row0['nama']."'".",
                'icon': 'mail-15'
                },
                'geometry': {
                'type': 'Point',
                'coordinates':"."[".$koor[1].",".$koor[0]."]
                }
                },";
                }
                ?>
            ]
};
map.on('load', () => {
// Add a GeoJSON source containing place coordinates and information.
map.addSource('places', {
'type': 'geojson',
'data': places
});
map.addLayer({
'id': 'poi-labels',
'type': 'symbol',
'source': 'places',
'layout': {
'text-field': ['get', 'description'],
'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
'text-radial-offset': 0.5,
'text-justify': 'auto',
'icon-image': ['get', 'icon']
}
});
});
</script>
<div id="map" style="width: 1400%;height: 100vh;"></div>
</div>
@endsection 