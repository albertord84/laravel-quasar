<div class="table-responsive">
    <table class="table" id="optionsResponses-table">
        <thead>
            <tr>
                <th>Question Id</th>
        <th>Response</th>
        <th>Truth</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($optionsResponses as $optionsResponses)
            <tr>
                <td>{{ $optionsResponses->question_id }}</td>
            <td>{{ $optionsResponses->response }}</td>
            <td>{{ $optionsResponses->truth }}</td>
                <td>
                    {!! Form::open(['route' => ['optionsResponses.destroy', $optionsResponses->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('optionsResponses.show', [$optionsResponses->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('optionsResponses.edit', [$optionsResponses->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
