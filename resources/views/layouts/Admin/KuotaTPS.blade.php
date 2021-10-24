@extends('layouts.nav')

@section('content') 

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<div class="container">
<div class="col-12 align-items-center">
<h2 class="text-center text-light bg-orange">Kuota TPS</h2>
</div>
<div class="card row m-4">
  <div class="card-body text-center">
    <h5 class="card-title">Kecamatan ....</h5>
    <h5 class="card-title">Kelurahan ....</h5>
  </div>
</div>
<div class="row m-2">
<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title">TPS 1</h5>
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

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 4</h5>
    <div class="alert alert-danger" role="alert">
  223/250
</div>
  </div>
</div>

</br>

<div class="row m-2">
<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title">TPS 5</h5>
    <div class="alert alert-danger" role="alert">
  250/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 6</h5>
    <div class="alert alert-danger" role="alert">
  223/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 7</h5>
    <div class="alert alert-danger" role="alert">
  198/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 8</h5>
    <div class="alert alert-danger" role="alert">
  223/250
</div>
  </div>
</div>

</br>

<div class="row m-2">
<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title">TPS 9</h5>
    <div class="alert alert-danger" role="alert">
  250/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 10</h5>
    <div class="alert alert-danger" role="alert">
  223/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 11</h5>
    <div class="alert alert-danger" role="alert">
  198/250
</div>
  </div>
</div>

</br>

<div class="col md-3 mb-2" style="width: 18rem;">
  <div class="card-body text-center">
    <h5 class="card-title text-center">TPS 12</h5>
    <div class="alert alert-danger" role="alert">
  223/250
</div>
  </div>
</div>

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

<!-- bar chart -->
<script>
  Highcharts.chart('bar', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Surat Masuk dan Surat Keluar KPU Kota Yogyakarta'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            'TPS 1',
            'TPS 2',
            'TPS 3',
            'TPS 4',
            'TPS 5',
            'TPS 6',
            'TPS 7',
            'TPS 8',
            'TPS 9',
            'TPS 10',
            'TPS 11',
            'TPS 12'
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
        data: [49, 71, 106, 129, 144, 176, 135, 148, 216, 194, 95, 54]

    }, {
        name: 'Surat Keluar',
        data: [83, 78, 98, 93, 106, 84, 105, 104, 91, 83, 106, 92]

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
        text: 'Total Surat Masuk dan Surat Keluar KPU Kota Yogyakarta'
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
            y: 61.41,
            
        }, {
            name: 'Surat Keluar',
            y: 11.84
        }] 
    }]
}); 
</script>
<button class="btn align-item-center btn-danger" href="" class="text-right" style="float: right;">Kembali</button>
</div>

@endsection 