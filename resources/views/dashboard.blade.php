@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div id="chart-date-one"></div>
        </div>
        <div class="col-md-6">
            <div id="chart-month-one"></div>
        </div>
        <div class="col-md-6">
            <div id="chart-date-team-two"></div>
        </div>
        <div class="col-md-6">
            <div id="chart-month-team-two"></div>
        </div>
        <div class="col-md-6">
            <div id="chart-date-team-three"></div>
        </div>
        <div class="col-md-6">
            <div id="chart-month-team-three"></div>
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
                text: 'Team One (Datewise)'
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
        var data = [
            @foreach ($team_one_data_monthly as $team_one)
                {{ $team_one }},
            @endforeach
        ];
        var month = [
            @foreach ($team_one_months as $month)
                "{{ $month }}",
            @endforeach
        ];
        Highcharts.chart('chart-month-one', {
            title: {
                text: 'Team One (Monthly)'
            },
            xAxis: {
                categories: month
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
            var online_pq_transfer = [
                @foreach ($team_two_online_pq_transfer_per_day as $transfer)
                    {{ $transfer }},
                @endforeach
            ];
            var online_pq_call = [
                @foreach ($team_two_online_pq_call_per_day as $calls)
                    {{ $calls }},
                @endforeach
            ];
            var fallout_transfer = [
                @foreach ($team_two_fallout_transfer_per_day as $fallout_transfer)
                    {{ $fallout_transfer }},
                @endforeach
            ];
            var fallout_call = [
                @foreach ($team_two_fallout_call_per_day as $fallout_calls)
                    {{ $fallout_calls }},
                @endforeach
            ];
            var others_transfer = [
                @foreach ($team_two_others_transfer_per_day as $other_transfer)
                    {{ $other_transfer }},
                @endforeach
            ];
            var others_call = [
                @foreach ($team_two_others_call_per_day as $other_calls)
                    {{ $other_calls }},
                @endforeach
            ];
            var date = [
                @foreach ($team_two_dates as $date)
                    "{{ $date }}",
                @endforeach
            ];
            Highcharts.chart('chart-date-team-two', {
                title: {
                    text: 'Team Two (Datewise)'
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
                        name: 'Online PQ Transfer Per Day',
                        data: online_pq_transfer
                    },
                    {
                        name: 'Online PQ Call Per Day',
                        data: online_pq_call
                    },
                    {
                        name: 'Fallout Transfer Per Day',
                        data: fallout_transfer
                    },
                    {
                        name: 'Fallout Call Per Day',
                        data: fallout_call
                    },
                    {
                        name: 'Others Transfer Per Day',
                        data: others_transfer
                    },
                    {
                        name: 'Others Call Per Day',
                        data: others_call
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
    <script>
        var online_pq_transfer = [
            @foreach ($team_two_online_pq_transfer_per_day_monthly as $pq_monthly)
                {{ $pq_monthly }},
            @endforeach
        ];
        var online_pq_calls = [
            @foreach ($team_two_online_pq_call_per_day_monthly as $pq_calls_monthly)
                {{ $pq_calls_monthly }},
            @endforeach
        ];

        var fallout_transfers_monthly = [
            @foreach ($team_two_fallout_transfer_per_day_monthly as $fallout_monthly)
                {{ $fallout_monthly }},
            @endforeach
        ];
        var fallout_calls_monthly = [
            @foreach ($team_two_fallout_call_per_day_monthly as $fallout_monthly)
                {{ $fallout_monthly }},
            @endforeach
        ];

        var others_transfer_monthly = [
            @foreach ($team_two_others_transfer_per_day_monthly as $other_transfer)
                {{ $other_transfer }},
            @endforeach
        ];
        var others_call_monthly = [
            @foreach ($team_two_others_call_per_day_monthly as $other_calls)
                {{ $other_calls }},
            @endforeach
        ];
       
        var month = [
            @foreach ($team_two_months as $month)
                "{{ $month }}",
            @endforeach
        ];
        Highcharts.chart('chart-month-team-two', {
            title: {
                text: 'Team Two (Monthly)'
            },
            xAxis: {
                categories: month
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
                name: 'Online PQ Transfer',
                data: online_pq_transfer
            },
            {
                name: 'Online PQ Calls',
                data: online_pq_calls
            },
            {
                name: 'Fallout Transfer',
                data: fallout_transfers_monthly
            },
            {
                name: 'Fallout Calls',
                data: fallout_calls_monthly
            },
            {
                name: 'Others Transfer',
                data: others_transfer_monthly
            },
            {
                name: 'Others Calls',
                data: others_call_monthly
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
                text: 'Team Three (Datewise)'
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
        <script>
            var tbd_assigned = [
                @foreach ($team_three_tbd_assigned_data_monthly as $tbd)
                    {{ $tbd }},
                @endforeach
            ];
            var no_of_matches = [
                @foreach ($team_three_no_of_matches_data_monthly as $matches)
                    {{ $matches }},
                @endforeach
            ];
            var month = [
                @foreach ($team_three_months as $month)
                    "{{ $month }}",
                @endforeach
            ];
            Highcharts.chart('chart-month-team-three', {
                title: {
                    text: 'Team Three (Monthly)'
                },
                xAxis: {
                    categories: month
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
