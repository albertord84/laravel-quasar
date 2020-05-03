<div class="table-responsive">
    <table class="table" id="extractionsStatuses-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($extractionsStatuses as $extractionsStatus)
            <tr>
                <td>{{ $extractionsStatus->name }}</td>
            <td>{{ $extractionsStatus->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['extractionsStatuses.destroy', $extractionsStatus->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('extractionsStatuses.show', [$extractionsStatus->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('extractionsStatuses.edit', [$extractionsStatus->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
