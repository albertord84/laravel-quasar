<div class="table-responsive">
    <table class="table" id="invitations-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Campaign Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invitations as $invitations)
            <tr>
                <td>{{ $invitations->user_id }}</td>
            <td>{{ $invitations->campaign_id }}</td>
                <td>
                    {!! Form::open(['route' => ['invitations.destroy', $invitations->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('invitations.show', [$invitations->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('invitations.edit', [$invitations->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
