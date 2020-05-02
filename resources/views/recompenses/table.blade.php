<div class="table-responsive">
    <table class="table" id="recompenses-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Questionnaire Id</th>
        <th>Campaign Id</th>
        <th>Value</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($recompenses as $recompenses)
            <tr>
                <td>{{ $recompenses->user_id }}</td>
            <td>{{ $recompenses->questionnaire_id }}</td>
            <td>{{ $recompenses->campaign_id }}</td>
            <td>{{ $recompenses->value }}</td>
                <td>
                    {!! Form::open(['route' => ['recompenses.destroy', $recompenses->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('recompenses.show', [$recompenses->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('recompenses.edit', [$recompenses->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
