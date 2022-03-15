@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div id="chart_one"></div>
    </div>
    <div class="col-md-3">
        <div id="chart_two"></div>
    </div>
    <div class="col-md-3">
        <div id="chart_three"></div>
    </div>
  </div>
@endsection
@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
   var data = <?php echo json_encode($datas)?>;
   var month = <?php echo json_encode($months)?>;
    Highcharts.chart('chart_one', {
        title: {
            text: 'Team One'
        },

        xAxis: {
            categories: month
        },
        yAxis: {
            title: {
                text: 'REA SIGNUP'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'REA SIGNUP',
            data: data
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });



</script>
@endsection