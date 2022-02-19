@extends('layouts.app')

@section('title', 'Roles')


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Roles List</h3>
            <div class="card-tools">
                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add Role
                </a>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>@sortablelink('name', 'Name')</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($roles) > 0)

                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name ?? 'undefined' }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('roles.destroy', $role) }}" class="btn btn-primary btn-sm"><i
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
        @if ($roles->total() > 4)
            <div class="card-footer clearfix">
                {{ $roles->appends(request()->input())->links() }}
            </div>
        @endif

    </div>



@endsection
