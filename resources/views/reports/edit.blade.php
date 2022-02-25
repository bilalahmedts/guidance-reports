@extends('layouts.app')

@section('title', 'Edit Guidance Reports')

@section('content')


    {{-- @if ($errors->any())
{{ implode('', $errors->all('<div>:message</div>')) }}
@endif --}}

    <div class="back-area mb-3">
        <a href="{{ route('reports.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i> Go
            Back</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Guidance Report</h3>
        </div>

        <form action="{{ route('reports.update', $stat) }}" method="post" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Agent Name</label>
                    <select name="user_id" class="form-control select2" id="user_list" disabled>
                        <option value="">Select Option</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if ($user->id == $stat->user_id) selected @endif>
                                {{ $user->name ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Team Name</label>
                    <input type="text" class="form-control" id="team_name" value="{{ $stat->user->team->name ?? '' }}"
                        disabled>
                </div>
                @if ($stat->user->team->name == 'Team One')
                    <div id="team_one">
                        <div class="form-group">
                            <label for="exampleInputEmail1">REA Signups</label>
                            <input type="text" class="form-control" name="rea_sign_up" value="{{ $stat->rea_sign_up }}"
                                placeholder="Enter REA Signups" id="team_one">
                        </div>
                        @error('rea_sign_up')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
                @if ($stat->user->team->name == 'Team Two')
                    <div id="team_two">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <select name="categories_id" class="form-control select2" id="category">
                                <option value="">Select Option</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $stat->categories_id) selected @endif>
                                        {{ $category->name ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="team_two_category">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Number of Calls Per Day</label>
                                <input type="text" class="form-control" name="call_per_day"
                                    placeholder="Number of Calls Per Day" id="call_per_day"
                                    value="{{ $stat->call_per_day }}">
                            </div>
                            @error('call_per_day')
                                <div class="validate-error">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Number of Transfers Per Day</label>
                                <input type="text" class="form-control" name="transfer_per_day"
                                    placeholder="Enter Number of Transfers Per Day" id="transfer_per_day"
                                    value="{{ $stat->transfer_per_day }}">
                            </div>
                            @error('transfer_per_day')
                                <div class="validate-error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endif
                @if ($stat->user->team->name == 'Team Three')
                    <div id="team_three">
                        <div class="form-group">
                            <label for="exampleInputEmail1">TBDs Assigned</label>
                            <input type="text" class="form-control" name="tbd_assigned" placeholder="Enter TBDs Assigned"
                                id="tbd_assigned" value="{{ $stat->tbd_assigned }}">
                        </div>
                        @error('tbd_assigned')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Number of Matches</label>
                            <input type="text" class="form-control" name="no_of_matches"
                                placeholder="Enter Number of Matches" id="no_of_matches"
                                value="{{ $stat->no_of_matches }}">
                        </div>
                        @error('no_of_matches')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
                @if ($stat->user->team->name == 'Team Chat')
                    <div id="team_chat">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Leads</label>
                            <input type="text" class="form-control" name="leads" placeholder="Enter Number of Leads"
                                id="leads" value="{{ $stat->leads }}">
                        </div>
                        @error('leads')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Conversations</label>
                            <input type="text" class="form-control" name="conversations"
                                placeholder="Enter Number of Conversations" id="conversations"
                                value="{{ $stat->conversations }}">
                        </div>
                        @error('conversations')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
                @if ($stat->user->team->name == 'Team Inbound')
                    <div id="team_inbound">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Inbounds</label>
                            <input type="text" class="form-control" name="inbound" placeholder="Enter Number of Inbounds"
                                id="inbounds" value="{{ $stat->inbound }}">
                        </div>
                        @error('inbound')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#user_list').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'get-team-detail/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        team = response.data
                        $("#team_name").val(team.team_name);
                    }
                })
            });
        });
        $(document).ready(function() {
            $('#category').change(function() {
                var id = $(this).val();
                $('#team_two_category').show()
            });
        });
    </script>
@endsection
