<div class="table-responsive">
    <table class="table" id="campaignsStatuses-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($campaignsStatuses as $campaignsStatus)
            <tr>
                <td>{{ $campaignsStatus->name }}</td>
            <td>{{ $campaignsStatus->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['campaignsStatuses.destroy', $campaignsStatus->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('campaignsStatuses.show', [$campaignsStatus->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('campaignsStatuses.edit', [$campaignsStatus->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
