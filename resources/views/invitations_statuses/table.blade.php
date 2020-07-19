<div class="table-responsive">
    <table class="table" id="invitationsStatuses-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invitationsStatuses as $invitationsStatus)
            <tr>
                <td>{{ $invitationsStatus->name }}</td>
            <td>{{ $invitationsStatus->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['invitationsStatuses.destroy', $invitationsStatus->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('invitationsStatuses.show', [$invitationsStatus->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('invitationsStatuses.edit', [$invitationsStatus->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
