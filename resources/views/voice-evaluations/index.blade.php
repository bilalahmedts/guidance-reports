@extends('layouts.app')

@section('title', 'Voice Evaluations')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
    <div class="back-area mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Voice Evaluations</h3>
        </div>
        <form action="{{-- {{ route('voice-evaluations.store') }} --}}" method="post" autocomplete="off">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Agent Name</label>
                            <select name="user_id" class="form-control select2">
                                <option value="">Select Option</option>
                                {{-- @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="exampleInputEmail1">Reporting To</label>
                        <input type="text" class="form-control" name="reporting_to" placeholder="Enter Reporting To"
                            required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Campaign Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Campaign Name" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Record Id</label>
                        <input type="text" class="form-control" name="record_id" placeholder="Enter Record Id" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="exampleInputEmail1">Call Date</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Call Date" required>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-footer-->
        </form>
    </div>
    <!-- /.card -->
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Datapoints</h3>
            <div class="card-tools">
                <a href="{{ route('voice-evaluations.categories.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Create Category
                </a>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>

                    </tr>
                </thead>
                <tbody>
{{--                     @if (count($campaign) > 0)

                        @foreach ($campaign as $camp)
                            <tr>
                                <td>{{ $camp->hrms_id ?? 'undefined' }}</td>
                                <td>{{ $camp->name ?? 'undefined' }}</td>
                                <td>
                                    @if ($camp->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('campaigns.edit', $camp) }}" class="btn btn-primary btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('campaigns.destroy', $camp) }}" class="btn btn-primary btn-sm"><i
                                                class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">No record found!</td>
                        </tr>
                    @endif --}}
                </tbody>
            </table>
        </div>
{{--         @if ($campaign->total() > 4)
            <div class="card-footer clearfix">
                {{ $campaign->appends(request()->input())->links() }}
            </div>
        @endif --}}

    </div>
@endsection
