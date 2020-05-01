<div class="table-responsive">
    <table class="table" id="questions-table">
        <thead>
            <tr>
                <th>Questionnaire Id</th>
        <th>Type Id</th>
        <th>Response Type Id</th>
        <th>Question</th>
        <th>Json Data</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($questions as $questions)
            <tr>
                <td>{{ $questions->questionnaire_id }}</td>
            <td>{{ $questions->type_id }}</td>
            <td>{{ $questions->response_type_id }}</td>
            <td>{{ $questions->question }}</td>
            <td>{{ $questions->json_data }}</td>
                <td>
                    {!! Form::open(['route' => ['questions.destroy', $questions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('questions.show', [$questions->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('questions.edit', [$questions->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
