@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div id="chart-date-one"></div>
        </div>
        <div class="col-md-6">
            <div id="chart-date-one"></div>
        </div>
        <div class="col-md-6">
            <div id="chart-date-team-three"></div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var data = [
            @foreach ($team_one_data as $team_one)
                        {{ $team_one }},
                    @endforeach
                ];
        var date = [
            @foreach ($team_one_dates as $date)
                "{{ $date }}",
            @endforeach
        ];
        Highcharts.chart('chart-date-one', {
            title: {
                text: 'Team One'
            },
            xAxis: {
                categories: date
            },
            yAxis: {
                title: {
                    text: ''
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
    <script>
        var tbd_assigned = [
            @foreach ($team_three_tbd_assigned_data as $tbd)
                        {{ $tbd }},
                    @endforeach
                ];
        var no_of_matches = [
            @foreach ($team_three_no_of_matches_data as $matches)
                        {{ $matches }},
                    @endforeach
                ];
        var date = [
            @foreach ($team_three_dates as $date)
                "{{ $date }}",
            @endforeach
        ];
        Highcharts.chart('chart-date-team-three', {
            title: {
                text: 'Team Three'
            },
            xAxis: {
                categories: date
            },
            yAxis: {
                title: {
                    text: ''
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
            series: [
                {
                name: 'TBD Assigned',
                data: tbd_assigned
            },
            {
                name: 'Number of Matches',
                data: no_of_matches
            },
        ],
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
