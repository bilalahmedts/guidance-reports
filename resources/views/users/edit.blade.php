
@extends('layouts.app')

@section('title', 'Edit User')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">User Detail</h3>
    </div>

    <form action="{{ route('users.update', $users) }}" method="post" autocomplete="off">
        @csrf
        @method("PUT")
        <div class="card-body">

            <table class="table table-bordered">
                <tbody>
                    <tr>
                       <th>Name</th>
                        <td>{{ $users->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Email Address</th>
                        <td>{{ $users->email ?? '' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <label for="exampleInputPassword1">Select Status</label>
                <select name="status" class="form-control select2" required>
                    <option value="1" @if($users->status == 1) selected @endif>Active</option>
                    <option value="0" @if($users->status == 0) selected @endif>Inactive</option>
                </select>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-footer-->

    </form>

</div>
<!-- /.card -->

@endsection


