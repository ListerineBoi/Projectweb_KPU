@extends('layouts.navPub')

@section('content') 
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<div class="container">
<div class="col-12 align-items-center">
<h2 class="text-center text-light bg-orange">DATA TPS</h2>
</div>
<div class="card row m-4"> 
  <div class="card-body text-center">
  <form method="get" action="{{route('kuotaTPSPub')}}">
    <h5 class="card-title">Cek Data TPS</h5>
    <div class="form-group row">
				<label class="control-label col-sm-2" for="nik" data-target="district">Kecamatan </label>
        
				<div class="col-sm-10">
				<select class="form-control city selectFilter" name="kec_jog" id="select1_1" dt="fetchkeldes">
      			  <option selected>Pilih Kecamatan</option>
					@foreach($kec as $row)
      			  <option value="{{$row->id}}">{{$row->nama}}</option>
					@endforeach
				  </select>
				</div>
			</div>

			<div class="form-group row">
				<label class="control-label col-sm-2" for="nik">kelurahan </label>
        <br>
				<div class="col-sm-10">
				<select class="form-control district selectFilter" name="kel_jog" id="select2_2" dt="fetchtps">
      			  <option selected>Pilih kelurahan</option>
					
				  </select>
				</div>
			</div>
      <button type="submit" class="btn btn-danger">Cek Data TPS</button>
      </form>
  </div>
  
</div>


<div class="col-12">
<div class="card border-dark">
      <div class="card-body">
<figure class="highcharts-figure">
     <div id="bar"></div> <!-- chart -->
    <p class="highcharts-description text-center">
        Grafik pergerakan Pengajuan Pindah Masuk dan Pengajuan Pindah Keluar pada TPS yang ada di Kota Yogyakarta
    </p>
</figure>
</div>
</div>

</br>

<div class="card border-dark">
      <div class="card-body">
<figure class="highcharts-figure">
    <div id="pie"></div>
    <p class="highcharts-description text-center">
    Grafik total Pengajuan Pindah Masuk dan Pengajuan Pindah Keluar pada TPS yang ada di Kota Yogyakarta
    </p>
</figure>
</div>
</div>

<!-- ////////////////////// -->
</div>
</div>
<script>
  Highcharts.chart('bar', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Pengajuan Pindah Masuk dan Pengajuan Pindah Keluar KPU Yogyakarta'
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
        name: 'Pengajuan Masuk',
        data: [
            <?php
                foreach($sumkec as $row2){
                    echo $row2['sumM'].",";
                }
                ?>
    
        ]

    }, {
        name: 'Pengajuan Keluar',
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
        text: 'Total Pengajuan Pindah Masuk dan Pengajuan Keluar KPU Yogyakarta'
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








</div>
</div> 

@endsection