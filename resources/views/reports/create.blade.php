    @extends('layouts.app')

    @section('title', 'Create Guidance Reports')

    @section('content')

        {{-- @if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif --}}

        <div class="back-area mb-3">
            <a href="{{ route('reports.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-2"></i>
                Go
                Back</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Guidance Report</h3>
            </div>
            <form action="{{ route('reports.store') }}" method="post" autocomplete="off">
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
                    <div class="form-group">
                        <label for="exampleInputEmail1">Team Name</label>
                        <input type="text" class="form-control" id="team_name" disabled>
                    </div>
                    <div id="team_one" style="display: none">
                        <div class="form-group">
                            <label for="exampleInputEmail1">REA Signups</label>
                            <input type="text" class="form-control" name="rea_sign_up" placeholder="Enter REA Signups"
                                id="team_one">
                        </div>
                        @error('rea_sign_up')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="team_two_inbound" style="display: none">
                        @foreach ($categories as $category)
                            <div id="accordion">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100" data-toggle="collapse"
                                                href="#category-{{ $category->id }}">
                                                {{ $category->name }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="category-{{ $category->id }}" class="collapse" {{-- data-parent="#accordion" --}}>
                                        <div class="card-body">
                                            <input type="hidden" class="form-control" name="category[]"
                                                value="{{ $category->id }}">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Number of Calls Per Day</label>
                                                <input type="text" class="form-control" name="call_per_day[]"
                                                    placeholder="Number of Calls Per Day" id="call_per_day">
                                            </div>
                                            @error('call_per_day')
                                                <div class="validate-error">{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Number of Transfers Per Day</label>
                                                <input type="text" class="form-control" name="transfer_per_day[]"
                                                    placeholder="Enter Number of Transfers Per Day" id="transfer_per_day">
                                            </div>
                                            @error('transfer_per_day')
                                                <div class="validate-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div id="team_three" style="display: none">
                        <div class="form-group">
                            <label for="exampleInputEmail1">TBDs Assigned</label>
                            <input type="text" class="form-control" name="tbd_assigned" placeholder="Enter TBDs Assigned"
                                id="tbd_assigned">
                        </div>
                        @error('tbd_assigned')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Number of Matches</label>
                            <input type="text" class="form-control" name="no_of_matches"
                                placeholder="Enter Number of Matches" id="no_of_matches">
                        </div>
                        @error('no_of_matches')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="team_chat" style="display: none">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Leads</label>
                            <input type="text" class="form-control" name="leads" placeholder="Enter Number of Leads"
                                id="leads">
                        </div>
                        @error('leads')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputEmail1">Conversations</label>
                            <input type="text" class="form-control" name="conversations"
                                placeholder="Enter Number of Conversations" id="conversations">
                        </div>
                        @error('conversations')
                            <div class="validate-error">{{ $message }}</div>
                        @enderror
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
                            team_type = team.team_id;
                            if (team_type == 1) {
                                $('#team_one').show()
                                $('#team_two_inbound').hide()
                                $('#team_three').hide()
                                $('#team_chat').hide()
                                $('#team_inbound').hide()
                            }
                            if (team_type == 2) {
                                $('#team_one').hide()
                                $('#team_two_inbound').show()

                                $('#team_three').hide()
                                $('#team_chat').hide()
                                $('#team_inbound').hide()
                            }
                            if (team_type == 3) {
                                $('#team_one').hide()
                                $('#team_two_inbound').hide()
                                $('#team_three').show()
                                $('#team_chat').hide()
                                $('#team_inbound').hide()
                            }
                            if (team_type == 4) {
                                $('#team_one').hide()
                                $('#team_two_inbound').hide()
                                $('#team_three').hide()
                                $('#team_chat').show()
                                $('#team_inbound').hide()
                            }
                            if (team_type == 5) {
                                $('#team_one').hide()
                                $('#team_two').hide()
                                $('#team_three').hide()
                                $('#team_chat').hide()
                                $('#team_two_inbound').show()
                            }
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
