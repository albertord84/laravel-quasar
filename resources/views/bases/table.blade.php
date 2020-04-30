<div class="table-responsive">
    <table class="table" id="bases-table">
        <thead>
            <tr>
                <th>Origin Id</th>
        <th>Company Id</th>
        <th>Criator Id</th>
        <th>Name</th>
        <th>Decription</th>
        <th>Json Data</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bases as $bases)
            <tr>
                <td>{{ $bases->origin_id }}</td>
            <td>{{ $bases->company_id }}</td>
            <td>{{ $bases->criator_id }}</td>
            <td>{{ $bases->name }}</td>
            <td>{{ $bases->decription }}</td>
            <td>{{ $bases->json_data }}</td>
                <td>
                    {!! Form::open(['route' => ['bases.destroy', $bases->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bases.show', [$bases->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('bases.edit', [$bases->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
