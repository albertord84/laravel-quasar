<div class="table-responsive">
    <table class="table" id="responsesTypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($responsesTypes as $responsesTypes)
            <tr>
                <td>{{ $responsesTypes->name }}</td>
            <td>{{ $responsesTypes->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['responsesTypes.destroy', $responsesTypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('responsesTypes.show', [$responsesTypes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('responsesTypes.edit', [$responsesTypes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
