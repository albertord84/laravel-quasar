<div class="table-responsive">
    <table class="table" id="basesOrigins-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($basesOrigins as $basesOrigins)
            <tr>
                <td>{{ $basesOrigins->name }}</td>
            <td>{{ $basesOrigins->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['basesOrigins.destroy', $basesOrigins->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('basesOrigins.show', [$basesOrigins->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('basesOrigins.edit', [$basesOrigins->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
