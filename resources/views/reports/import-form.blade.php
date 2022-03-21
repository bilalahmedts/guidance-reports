@extends('layouts.app')

@section('title', 'Import Guidance Reports')

@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Import Guidance Report</h3>
            <div class="card-tools">
                <a href="{{ route('reports.import') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Import
                </a>
            </div>
        </div>
    </div>
@endsection