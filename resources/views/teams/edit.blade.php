@extends('layouts.app')

@section('title', 'Teams')


@section('content')

<div class="back-area mb-3">
    <a href="{{ route('teams.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit team</h3>
    </div>

    <form action="{{ route('teams.update', $team) }}" method="post" autocomplete="off">
        @csrf
        @method("PUT")
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">team Name</label>
                <input type="text" class="form-control" name="name" value="{{ $team->name }}" placeholder="Enter team Name" required>
            </div>
            @error('name')
                <div class="validate-error">{{ $message }}</div>
            @enderror
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-footer-->

    </form>
</div>
<!-- /.card -->

@endsection
