@extends('layouts.app')

@section('title', 'View Guidance Reports')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('warning'))
        <div class="alert alert-warning">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Guidance Report</h3>
            <div class="card-tools">
                <a href="{{ route('reports.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Create Report
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
                        <th>Action</th>
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
                                <td>
                                    <a href="{{ route('reports.edit', $stat) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('reports.destroy', $stat) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-trash"></i></a>
                                </td>
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
        @if ($stats->total() > 10)
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
    </script>
@endsection
