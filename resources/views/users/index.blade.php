@extends('layouts.app')

@section('title', 'Users')


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Users List</h3>

        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>@sortablelink('name', 'Name')</th>
                        <th>@sortablelink('email', 'Email')</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) > 0)

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name ?? 'undefined' }}</td>
                                <td>{{ $user->email ?? 'undefined' }}</td>

                                <td>
                                    @if ($user->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></a>
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
        @if ($users->total() > 4)
            <div class="card-footer clearfix">
                {{ $users->appends(request()->input())->links() }}
            </div>
        @endif

    </div>



@endsection
