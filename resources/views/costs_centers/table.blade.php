<div class="table-responsive">
    <table class="table" id="costsCenters-table">
        <thead>
            <tr>
                <th>Company Id</th>
        <th>Admin Id</th>
        <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($costsCenters as $costsCenters)
            <tr>
                <td>{{ $costsCenters->company_id }}</td>
            <td>{{ $costsCenters->admin_id }}</td>
            <td>{{ $costsCenters->name }}</td>
                <td>
                    {!! Form::open(['route' => ['costsCenters.destroy', $costsCenters->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('costsCenters.show', [$costsCenters->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('costsCenters.edit', [$costsCenters->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
