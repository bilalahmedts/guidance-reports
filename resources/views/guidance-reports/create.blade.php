
@extends('layouts.app')

@section('title', 'Create Guidance Reports')


@section('content')

{{-- @if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif --}}
<div class="back-area mb-3">
    <a href="{{ route('guidance-reports.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go Back</a>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Guidance Report</h3>
    </div>

    <form action="{{ route('guidance-reports.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Agent Name</label>
                <select name="user_id" class="form-control select2" id="user_list">
                    <option value="">Select Option</option>
                    @foreach ($users as $user)

                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach

                </select>
            </div>
            @error('user_id')
                <div class="validate-error">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Team Name</label>
                <input type="text" class="form-control" name="team_id"  required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Number of Calls Per Day</label>
                <input type="text" class="form-control" name="call_per_day" placeholder="Number of Calls Per Day" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Number of Transfers Per Day</label>
                <input type="text" class="form-control" name="transfer_per_day" placeholder="Enter Number of Transfers Per Day" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">REA Signups</label>
                <input type="text" class="form-control" name="rea_signup" placeholder="Enter REA Signups" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">TBDs Assigned</label>
                <input type="text" class="form-control" name="tbd_assigned" placeholder="Enter TBDs Assigned" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Number of Matches</label>
                <input type="text" class="form-control" name="no_of_matches" placeholder="Enter Number of Matches" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Leads</label>
                <input type="text" class="form-control" name="leads" placeholder="Enter Number of Leads" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Chats</label>
                <input type="text" class="form-control" name="chats" placeholder="Enter Number of Chats" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Inbounds</label>
                <input type="text" class="form-control" name="inbounds" placeholder="Enter Number of Inbounds" required>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- /.card-footer-->

    </form>
</div>



@endsection
@section('scripts')


    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#user_list').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'get-user-detail/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        user = response.data
                        $("#reporting_to").val(user.reporting_to);
                        $("#campaign_name").val(user.campaign_name);
                    }
                })
            });
        });

    </script> --}}

@endsection
