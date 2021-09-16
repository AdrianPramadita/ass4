@extends('layouts.front.master')
@section('content')

<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="icofont icofont-chart-bar-graph bg-c-blue"></i>
                        <div class="d-inline">
                            <h4>Ini adalah halaman Charts</h4>
                            <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Charts</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Halaman Chart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->
                <!-- Bar Chart start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Bar chart</h5>
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                    </div>
                    
                    <div class="card-block">
                        <div class="panel">
                            <div id="chartIncome">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartIncome',{ 
    
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan Income Resto Salt'
        },
        xAxis: {
            categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Income'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
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
            name: 'Data',
            data: {{json_encode($data)}}
        }]
    });

</script>
@stop
