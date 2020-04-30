<div class="table-responsive">
    <table class="table" id="responses-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Question Id</th>
        <th>Campaign Id</th>
        <th>Response Option Id</th>
        <th>Discursive Text</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($responses as $responses)
            <tr>
                <td>{{ $responses->user_id }}</td>
            <td>{{ $responses->question_id }}</td>
            <td>{{ $responses->campaign_id }}</td>
            <td>{{ $responses->response_option_id }}</td>
            <td>{{ $responses->discursive_text }}</td>
                <td>
                    {!! Form::open(['route' => ['responses.destroy', $responses->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('responses.show', [$responses->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('responses.edit', [$responses->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
