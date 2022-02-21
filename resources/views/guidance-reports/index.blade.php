
@extends('layouts.app')

@section('title', 'View Guidance Reports')


@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Guidance Report</h3>
            <div class="card-tools">
                <a href="{{ route('guidance-reports.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Create Report
                </a>
            </div>
        </div>



@endsection
