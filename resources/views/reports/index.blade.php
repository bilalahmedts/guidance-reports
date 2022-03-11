@extends('layouts.app')

@section('title', 'View Guidance Reports')

@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if($message = Session::get('warning'))
    <div class="alert alert-warning">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="search-area pt-2 pb-2">
    <div class="row">

        <div class="col-md-6">
            <h4 class="mb-0">Search</h4>
        </div>
        <div class="col-md-6">
            <div class="button-area">
                <button type="button" id="btn-search" class="btn btn-primary float-right"><i
                        class="fas fa-filter"></i></button>
            </div>
        </div>

    </div>
    @php
        $name = '';
        $email = '';


        if (isset($_GET['name'])) {
        $name = $_GET['name'];
        }
        if (isset($_GET['email'])) {
        $email = $_GET['email'];
        }

    @endphp

    <form action="{{ route('reports.index') }}" method="get" autocomplete="off">
        <input type="hidden" name="search" value="1">
        <div class="card card-primary card-outline mt-3" id="search" @if (!isset($_GET['search']))
            style="display: none;" @endif>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Agent Name</label>
                        <select name="user_id" class="form-control select2">
                            <option value="">Select Option</option>
                            @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Email Address</label>
                        <input type="text" name="email" value="{{ $email }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('users.index') }}" class="ml-5">Clear Search</a>
            </div>
        </div>
    </form>

</div>
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
                    <th>@sortablelink('created_at', 'Date')</th>
                    <th>@sortablelink('user.name', 'Agent Name')</th>
                    <th>@sortablelink('team.name', 'Team Name')</th>
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
                @if(count($stats) > 0)
                    @foreach($stats as $stat)
                        <tr>
                            <td>{{ $stat->created_at->format('d-m-Y') ?? '-' }}
                            </td>
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
                                <a href="{{ route('reports.edit', $stat) }}"
                                    class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('reports.destroy', $stat) }}"
                                    class="btn btn-primary btn-sm"><i class="fas fa-trash"></i></a>
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
    @if($stats->total() > 10)
        <div class="card-footer clearfix">
            {{ $stats->appends(request()->input())->links() }}
        </div>
    @endif
</div>
@endsection
@section('scripts')
<script>
    $("#btn-search").click(function () {
        $("#search").toggle();
    });
</script>
@endsection
