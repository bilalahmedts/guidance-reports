@extends('layouts.app')

@section('title', 'Import Guidance Reports')

@section('content')

@if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <p>{{ $message }}</p>
    </div>
@endif
@if(count($errors) > 0)
    <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
@endif
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Import Guidance Report</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('reports.import') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="exampleInputFile">File input</label> <a href="{{ asset("guidance-report.xlsx") }}" download>(Click here to download relevant file format)</a>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Upload</button>
              </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>
@endsection