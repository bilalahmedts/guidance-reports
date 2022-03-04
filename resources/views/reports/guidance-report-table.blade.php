<table class="table table-bordered">
    <thead>
        <tr>
            <th>Date</th>
            <th>Agent Name</th>
            <th>Team</th>
            <th>Campaign</th>
            <th>Transfer Per Day</th>
            <th>Call Per Day</th>
            <th>REA Sign Up</th>
            <th>TBD Assigned</th>
            <th>Number of Matches</th>
            <th>Leads</th>
            <th>Conversations</th>
            <th>Inbound</th>
        </tr>
    </thead>
    <tbody>
        @if (count($stats) > 0)
            @foreach ($stats as $stat)
                <tr>
                    <td>{{ $stat->created_at->format('d-m-Y') ?? '-' }}</td>
                    <td>{{ $stat->user->name ?? '-' }}</td>
                    <td>{{ $stat->user->team->name ?? '-' }}</td>
                    <td>{{ $stat->category->name ?? '-' }}</td>
                    <td>{{ $stat->transfer_per_day ?? '-' }}</td>
                    <td>{{ $stat->call_per_day ?? '-' }}</td>
                    <td>{{ $stat->rea_sign_up ?? '-' }}</td>
                    <td>{{ $stat->tbd_assigned ?? '-' }}</td>
                    <td>{{ $stat->no_of_matches ?? '-' }}</td>
                    <td>{{ $stat->leads ?? '-' }}</td>
                    <td>{{ $stat->conversations ?? '-' }}</td>
                    <td>{{ $stat->inbound ?? '-' }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">No record found!</td>
            </tr>
        @endif
    </tbody>
</table>