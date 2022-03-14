@extends('layouts.app')

@section('title', 'Teams')


@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
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
            if (isset($_GET['name'])) {
                $name = $_GET['name'];
            }
        @endphp

        <form action="{{ route('teams.index') }}" method="get" autocomplete="off">
            <input type="hidden" name="search" value="1">
            <div class="card card-primary card-outline mt-3" id="search" @if (!isset($_GET['search'])) style="display: none;" @endif>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">Team Name</label>
                            <input type="text" name="name" value="{{ $name }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('teams.index') }}" class="ml-5">Clear Search</a>
                </div>
            </div>
        </form>

    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Teams List</h3>
            <div class="card-tools">
                <a href="{{ route('teams.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add Team
                </a>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($teams) > 0)

                        @foreach ($teams as $team)
                            <tr>
                                <td>{{ $team->name ?? 'undefined' }}</td>
                                <td>
                                    <a href="{{ route('teams.edit', $team) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('teams.destroy', $team) }}" class="btn btn-primary btn-sm"><i
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
        @if ($teams->total() > 4)
            <div class="card-footer clearfix">
                {{ $teams->appends(request()->input())->links() }}
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
