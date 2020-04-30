<div class="table-responsive">
    <table class="table" id="questionsTypes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($questionsTypes as $questionsTypes)
            <tr>
                <td>{{ $questionsTypes->name }}</td>
            <td>{{ $questionsTypes->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['questionsTypes.destroy', $questionsTypes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('questionsTypes.show', [$questionsTypes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('questionsTypes.edit', [$questionsTypes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
