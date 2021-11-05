@extends('layouts.nav')

@section('content') 
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<div class="container">
<div class="col-12 align-items-center">
<h2 class="text-center text-light bg-orange">DATA TPS</h2>
</div>
</br>
<div class="card row m-4"> 
  <div class="card-body text-center">
  <form method="get" action="{{route('kuotaTPSPub')}}">
    <h5 class="card-title">Cek Data TPS</h5>
    <div class="form-group row m-2">
				<div class="col md-3 mb-2">
				<select class="form-control city selectFilter" name="kec_jog" id="select1_1" dt="fetchkeldes">
      			  <option selected>Pilih Kecamatan</option>
					@foreach($kec as $row)
      			  <option value="{{$row->id}}">{{$row->nama}}</option>
					@endforeach
				  </select>
			</div>
</div>
<div class="form-group row m-2">
				<div class="col md-3 mb-2">
        <select class="form-control district selectFilter" name="kel_jog" id="select2_2" dt="fetchtps">
      			  <option selected>Pilih kelurahan</option>
					{{ csrf_field() }}
				  </select>
			</div>
</div>
<button type="submit" class="btn btn-danger">Cek Data TPS</button>
      </form>
</div>

<div class="card row m-4">
  <div class="card-body text-center">
    <h5 class="card-title">Input Data TPS</h5>
    <p class="card-text">Klik tombol untuk menambahkan data TPS</p>
    <a href="/InputTPS/Admin" class="btn btn-primary">Input</a>
  </div>
</div>

</div>
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

<!-- ////////////////////// -->

</div>
<script>
  Highcharts.chart('bar', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Surat Masuk dan Surat Keluar KPU Yogyakarta'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            <?php
                foreach($kec as $row1){
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
                foreach($sumkec as $row2){
                    echo $row2['sumM'].",";
                }
                ?>
    
        ]

    }, {
        name: 'Surat Keluar',
        data: [
            <?php
                foreach($sumkec as $row3){
                    echo $row3['sumK'].",";
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
        text: 'Total Surat Masuk dan Surat Keluar KPU Yogyakarta'
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
@endsection 