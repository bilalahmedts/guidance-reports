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
            <div class="card card-primary card-outline mt-3" id="search" @if (!isset($_GET['search'])) style="display: none;" @endif>
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
            <div class="card-tools">
                <a href="{{-- {{ route('reports.export') }} --}}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Export Report
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Agent Name</th>
                        <th>Team</th>
                        <th>Campaign</th>
                        <th>Transfer Per Day</th>
                        <th>Call Per Day</th>
                        <th>REA Sign Up</th>
                        <th>TBD Assigned</th>
                        <th>Number of Matches</th>
                        <th>Leads</th>
                        <th>Conversations</th>
                        <th>Inbound</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($stats) > 0)
                        @foreach ($stats as $stat)
                            <tr>
                                <td>{{ $stat->created_at->format('d-m-Y') ?? '-' }}</td>
                                <td>{{ $stat->user->name ?? '-' }}</td>
                                <td>{{ $stat->user->team->name ?? '-' }}</td>
                                <td>{{ $stat->category->name ?? '-' }}</td>
                                <td>{{ $stat->transfer_per_day ?? '-' }}</td>
                                <td>{{ $stat->call_per_day ?? '-' }}</td>
                                <td>{{ $stat->rea_sign_up ?? '-' }}</td>
                                <td>{{ $stat->tbd_assigned ?? '-' }}</td>
                                <td>{{ $stat->no_of_matches ?? '-' }}</td>
                                <td>{{ $stat->leads ?? '-' }}</td>
                                <td>{{ $stat->conversations ?? '-' }}</td>
                                <td>{{ $stat->inbound ?? '-' }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">No record found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
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
