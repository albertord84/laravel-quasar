<div class="table-responsive">
    <table class="table" id="campaigns-table">
        <thead>
            <tr>
                <th>Status Id</th>
        <th>Criator Id</th>
        <th>Updater Id</th>
        <th>Questionary Id</th>
        <th>Base Id</th>
        <th>Name</th>
        <th>Objetive</th>
        <th>Description</th>
        <th>Observation</th>
        <th>Response Limit</th>
        <th>Response Amount</th>
        <th>Invitations Sent</th>
        <th>Invitations Accepted</th>
        <th>Invitations Declined</th>
        <th>Requested Date</th>
        <th>Analyzed Date</th>
        <th>Start Date</th>
        <th>End Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($campaigns as $campaigns)
            <tr>
                <td>{{ $campaigns->status_id }}</td>
            <td>{{ $campaigns->criator_id }}</td>
            <td>{{ $campaigns->updater_id }}</td>
            <td>{{ $campaigns->questionary_id }}</td>
            <td>{{ $campaigns->base_id }}</td>
            <td>{{ $campaigns->name }}</td>
            <td>{{ $campaigns->objetive }}</td>
            <td>{{ $campaigns->description }}</td>
            <td>{{ $campaigns->observation }}</td>
            <td>{{ $campaigns->response_limit }}</td>
            <td>{{ $campaigns->response_amount }}</td>
            <td>{{ $campaigns->invitations_sent }}</td>
            <td>{{ $campaigns->invitations_accepted }}</td>
            <td>{{ $campaigns->invitations_declined }}</td>
            <td>{{ $campaigns->requested_date }}</td>
            <td>{{ $campaigns->analyzed_date }}</td>
            <td>{{ $campaigns->start_date }}</td>
            <td>{{ $campaigns->end_date }}</td>
                <td>
                    {!! Form::open(['route' => ['campaigns.destroy', $campaigns->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('campaigns.show', [$campaigns->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('campaigns.edit', [$campaigns->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
