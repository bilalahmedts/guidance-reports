@extends('layouts.app')

@section('title', 'Guidance Reports')

@section('content')
    <div class="search-area pt-2 pb-2">
        <div class="row">

            <div class="col-md-6">
                <h4 class="mb-0">Get Report</h4>
            </div>
            <div class="col-md-6">
                <div class="button-area">
                    <button type="button" id="btn-search" class="btn btn-primary float-right"><i
                            class="fas fa-filter"></i></button>
                </div>
            </div>
        </div>

        @php
            $start_date = '';
            $end_date = '';
            
            if (isset($_GET['search'])) {
                if (!empty($_GET['start_date'])) {
                    $start_date = $_GET['start_date'];
                }
                if (!empty($_GET['end_date'])) {
                    $end_date = $_GET['end_date'];
                }
            }
        @endphp

        <form action="{{ route('reports.guidance-reports') }}" method="get" autocomplete="off">
            <input type="hidden" name="search" value="1">
            <div class="card card-primary card-outline mt-3" id="search"
                @if (!isset($_GET['search'])) style="display: none;" @endif>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Start Date</label>
                            <input type="text" class="form-control datetimepicker-input datepicker1"
                                data-toggle="datetimepicker" data-target=".datepicker1" name="start_date"
                                placeholder="Enter Start Date" value="{{ $start_date }}" required>
                        </div>
                        <div class="col-sm-6">
                            <label>End Date</label>
                            <input type="text" class="form-control datetimepicker-input datepicker2"
                                data-toggle="datetimepicker" data-target=".datepicker2" name="end_date"
                                placeholder="Enter End Date" value="{{ $end_date }}" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('reports.guidance-reports') }}" class="ml-5">Clear Search</a>
                </div>
            </div>
        </form>

    </div>

    <div class="card card-primary card-outline">

        <div class="card-header">
            <h3 class="card-title">Guidance Report</h3>
            @if (count($stats) > 0)
                <div class="card-tools">
                    <a href="{{ route('reports.guidance-report-table') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Export Report
                    </a>
                </div>
            @endif
        </div>
        <div class="card-body">
            @include('reports.guidance-report-table')
        </div>
        @if ($stats)
            <div class="card-footer clearfix">
                {{ $stats->appends(request()->input())->links() }}
            </div>
        @endif
    </div>
@endsection
@section('scripts')
    <script>
        $("#btn-search").click(function() {
            $("#search").toggle();
        });
        $('.datepicker1').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY',
            keepInvalid: false
        });
        $('.datepicker2').datetimepicker({
            format: 'L',
            format: 'DD/MM/YYYY',
            keepInvalid: false
        });
    </script>

@endsection
