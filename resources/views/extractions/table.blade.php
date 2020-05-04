<div class="table-responsive">
    <table class="table" id="extractions-table">
        <thead>
            <tr>
                <th>Status Id</th>
        <th>User Id</th>
        <th>Requested Value</th>
        <th>Payed Value</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($extractions as $extractions)
            <tr>
                <td>{{ $extractions->status_id }}</td>
            <td>{{ $extractions->user_id }}</td>
            <td>{{ $extractions->requested_value }}</td>
            <td>{{ $extractions->payed_value }}</td>
                <td>
                    {!! Form::open(['route' => ['extractions.destroy', $extractions->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('extractions.show', [$extractions->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('extractions.edit', [$extractions->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
